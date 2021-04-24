<template>

    <div class="container margin-top-container">

        <div class="row">

            <div class="col-lg-3 col-md-8">
                <div class="box-general">
                    <div class="profile">

                        <!-- Filter results part -->
                        <div class="filters">
                            <b>Filtra per:</b>
                            <hr>

                            <div>
                                <input @change="restoreResults(checkedVote)" type="checkbox" v-model="checkedVote">
                                <small>Media voti</small>

                                <div v-for="i in 5" v-if="checkedVote">
                                    <input @change="filterByVote()" type="radio" :value="i"  v-model="checkedVoteValue">
                                    <span>
                                        <i class="fas fa-star" v-for="number in i"></i>
                                    </span>
                                </div>
                            </div>

                            <div>
                                <input @change="restoreResults(checkedReview)" type="checkbox" v-model="checkedReview">
                                <small>Numero di recensioni</small>

                                <div @change="filterByReviews()" v-if="checkedReview">
                                    <input type="radio">
                                    <i class="far fa-edit"></i> <span>In ordine decrescente</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Fine colonna di sinistra -->

            <div class="col-lg-9 col-md-8">
                <div class="box-general">
                    <div class="">

                        <div v-if="filteredResults.length === 0">
                            <h3>La tua ricerca non ha prodotto risultati.</h3>
                            <h4>Per effettuare una nuova ricerca, torna sulla <a href="/">homepage</a> o cambia filtri.</h4>
                        </div>

                        <!-- Mostriamo i risultati iniziali della ricerca effettuata nella homepage -->
                        <div>
                            <div class="strip-list" v-for="(doctor, index) in filteredResults" :key="index">
                                <div class="column col-md-3 col-sm-4 align-self-center">
                                <div class="">
                                    <b>Recensioni:</b>
                                    <span>{{doctor.reviews.length}}</span>
                                </div>

                                  <div class=" ">
                                    <b>Media Voto:</b>
                                    <br>
                                    <i class="fas fa-star" v-for="vote in getVotesAverage(doctor)" v-if="getVotesAverage(doctor)"></i><i class="far fa-star" v-for="vote in (5 - getVotesAverage(doctor))"></i>
                                </div>
                            </div>
                                <div class="col-md-3 col-sm-4 column align-self-center">
                                    <b>Specializzazioni:</b>
                                    <span v-for="(obj, index) in doctor.departments" :key="index">
                                        {{obj.type}}{{(index !== doctor.departments.length - 1) ? ',' : ''}}
                                    </span>
                                </div>

                                <div class="col-md-3 col-sm-4 align-self-center">
                                    <b>Nome:</b>
                                    <br>
                                    <a :href="`doctor/${doctor.id}`">{{doctor.name}} {{doctor.lastname}}</a>
                                </div>

                                <div class=" doctor-pic-advance-container">
                                    <a class="doctor-pic" :href="`doctor/${doctor.id}`">
                                        <img class="doctor-pic" :src="`storage/${doctor.detail.pic}`" alt="profile pic" onerror="this.onerror = null; this.src='https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png';">
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- row -->

    </div>
    <!-- container -->

</template>

<script>

    export default {

        data: function () {

            return {
                searchedDepartment: window.location.search.substring(window.location.search.lastIndexOf('=') + 1),

                checkedVote: '',
                checkedVoteValue: '',
                checkedReview: '',

                results: [],
                filteredResults: []
            }
        },

        mounted() {
            // All doctors data filtererd by homepage research
            
            const self = this;

            // Chiamata Axios all'API dottori
            axios.get('http://127.0.0.1:8000/api/doctors', {
            })
            .then((resp) => {
                self.results = resp.data.data;

                this.initialFilters();
            });
        },

        methods: {

            initialFilters: function() {
                const today = Date.parse(new Date());                 
                const byDepartment = [];

                this.results.forEach(element => {

                    /* Sostituiamo gli eventuali + derivanti dalla query string per poterla confrontare
                    con i risultati */
                    while (this.searchedDepartment.includes('+')) {
                        this.searchedDepartment = this.searchedDepartment.replace('+', ' ');
                    }

                    // Filtro risultati in base al department scelto in home
                    element.departments.forEach(item => {
                        if(item.type === this.searchedDepartment) {
                            byDepartment.push(element);
                        }
                    });
                });

                const sponsored = [];
                const notSponsored = [];

                byDepartment.forEach(elem => {
                    if(elem.sponsors.length > 0) {

                        elem.sponsors.forEach(sponsor => {

                            /* Verifichiamo che il medico abbia una sponsorizzazione in corso
                            per visualizzarlo all'inizio dei risultati */
                            if(today < (Date.parse(sponsor.created_at) + (sponsor.duration * 3600000))) {
                                sponsored.push(elem);
                            }
                        });

                    } else {
                        notSponsored.push(elem);
                    }
                });
                                            
                this.filteredResults = [...sponsored,...notSponsored];
            },

            // Resettiamo i risultati; utile in caso di passaggio da un filtro ad un altro
            restoreResults: function(check) {
                if (!check) {
                    this.filteredResults = [];
                    this.initialFilters();

                    if (this.checkedVote && !this.checkedReview) {
                        this.filterByVote();
                    } else if (!this.checkedVote && this.checkedReview) {
                        this.filterByReviews();
                    }
                }
            },

            // Recuperiamo i voti di un dottore
            getVotesAverage: function(element) {
                const votesCount = element.votes.length;
                let votesSum = 0;
                let votesAverage;

                element.votes.forEach(elem => {
                    votesSum += elem.value;
                });

                votesAverage = Math.ceil(votesSum / votesCount);

                if(!isNaN(votesAverage)) {
                    return votesAverage;
                } else {
                    return 0;
                }
            },

            // Filtriamo i risultati per voto
            filterByVote: function () {
                const filteredByVote = [];

                this.filteredResults = [];
                this.initialFilters();

                this.filteredResults.forEach(element => {

                    if (this.getVotesAverage(element) === this.checkedVoteValue) {
                        filteredByVote.push(element);
                    }

                });

                this.filteredResults = filteredByVote;

                if (this.checkedReview) {
                    this.filterByReviews();
                }
            },

            // Filtriamo i risultati per recensione
            filterByReviews: function() {
                const filteredByReviews = [];

                this.filteredResults.forEach(element => {
                    filteredByReviews.push(element);

                    filteredByReviews.sort((a, b) => (b.reviews.length > a.reviews.length) ? 1 : -1);

                });

                this.filteredResults = filteredByReviews;
            },

        }
    }
</script>

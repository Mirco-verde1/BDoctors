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

                        <!-- Mostriamo i risultati iniziali della ricerca effettuata nella homepage -->
                        <div>
                            <div class="strip-list" v-for="(doctor, index) in filteredResults" :key="index">
                                  <div class="col-md-3 column align-self-center">
                                    <b>Voto:</b>
                                    <span v-for="(obj, index) in doctor.votes" :key="index">
                                       {{obj.value}}
                                    </span>
                                </div>
                                <div class="col-md-3 column align-self-center">
                                    <b>Specializzazioni:</b>
                                    <span v-for="(obj, index) in doctor.departments" :key="index">
                                        {{obj.type}}{{(index !== doctor.departments.length - 1) ? ',' : ''}}
                                    </span>
                                </div>

                                <div class="col-md-3 align-self-center">
                                    <b>Nome:</b> {{doctor.name}} {{doctor.lastname}}
                                </div>


                                <figure class=" doctor-pic-dashboard-container ">
                                    <a  :href="'doctor/'+ doctor.id">
                                        <img class="doctor-pic" :src="'storage/' + doctor.detail.pic" alt="profile pic">
                                    </a>
                                </figure>

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

        /* Sostituiamo gli eventuali + derivanti dalla query string per poterla confrontare
        con i risultati */
        while (this.searchedDepartment.includes('+')) {
            this.searchedDepartment = this.searchedDepartment.replace('+', ' ');
        }

        // Chiamata Axios all'API per filtrare i risultati in base al department scelto in home
        axios.get('http://127.0.0.1:8000/api/doctors', {
        })
        .then((resp) => {
            self.results = resp.data;

            self.results.data.forEach(element => {

                element.departments.forEach(item => {
                    if(item.type === self.searchedDepartment) {
                        self.filteredResults.push(element);
                    }
                });

            });
        });
    },

    methods: {

        // Resettiamo i risultati; utile in caso di passaggio da un filtro ad un altro
        restoreResults: function(check) {
            if (!check) {

                this.filteredResults = [];

                this.results.data.forEach(element => {

                    element.departments.forEach(item => {
                        if(item.type === this.searchedDepartment) {
                            this.filteredResults.push(element);
                        }
                    });

                });
            }
        },

        // Filtriamo i risultati per voto
        filterByVote: function () {
            const filteredByVote = [];

            this.restoreResults();

            this.filteredResults.forEach(element => {
                let votesSum = 0;
                let votesCount = element.votes.length;
                let votesAverage;

                element.votes.forEach(elem => {
                    votesSum += elem.value;
                });

                votesAverage = Math.ceil(votesSum / votesCount);

                if (votesAverage === this.checkedVoteValue) {
                    filteredByVote.push(element);
                }
            });

            this.filteredResults = filteredByVote;

            if (this.checkedReview) {
                this.filterByReviews()
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
        }
    }
}
</script>

<template>

    <div class="container margin-top-container">

        <div class="row">

            <div class="col-lg-3 col-md-8">
                <div class="box-general">
                    <div class="profile">
                        <!-- Filter results part -->
                        <div v-if="filteredResults.length > 0">

                            <div class="filters">
                                <b>Filtra per:</b>
                                <hr>

                                <small>Voto</small>

                                <div @change="filterByVote()" v-for="i in 5">
                                    <input type="radio" :value="i" v-model="checkedVote">
                                    <span>
                                        <i class="fas fa-star" v-for="number in i"></i>
                                    </span>
                                </div>

                                <small>Numero di recensioni</small>

                                <div>
                                    <input type="checkbox" @change="filterByReviews()" value="" v-model="checkedReview">
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
                        <div v-if="!checkedVote && filteredByVote.length === 0 && filteredByReviews.length === 0">
                            <div class="strip-list" v-for="(doctor, index) in filteredResults" :key="index">

                                <div>
                                    Nome: {{doctor.name}} {{doctor.lastname}}
                                </div>

                                <div>
                                    Specializzazioni:
                                    <span v-for="(obj, index) in doctor.departments" :key="index">
                                        {{obj.type}}{{(index !== doctor.departments.length - 1) ? ',' : ''}}
                                    </span>
                                </div>

                                <figure class=" doctor-pic-dashboard-container">
                                    <a  :href="'doctor/'+ doctor.id">
                                        <img class="doctor-pic" :src="'storage/' + doctor.detail.pic" alt="profile pic">
                                    </a>
                                </figure>

                            </div>
                        </div>

                        <!-- Mostriamo i risultati della ricerca tramite filtro per i voti -->
                        <div v-if="filteredByVote.length > 0">

                            <div class="strip-list" v-for="(doctor, index) in filteredByVote" :key="index">

                                <div>
                                    Nome:{{doctor.name}} {{doctor.lastname}}
                                </div>

                                <div>
                                    Specializzazioni:
                                    <span v-for="(obj, index) in doctor.departments" :key="index">
                                        {{obj.type}}{{(index !== doctor.departments.length - 1) ? ',' : ''}}
                                    </span>
                                </div>

                                <figure class=" doctor-pic-dashboard-container">
                                    <a  :href="'doctor/'+ doctor.id">
                                        <img class="doctor-pic" :src="'storage/' + doctor.detail.pic" alt="profile pic">
                                    </a>
                                </figure>

                            </div>

                        </div>


                        <!-- Mostriamo i risultati della ricerca tramite filtro per le reviews -->
                        <div v-if="filteredByReviews.length > 0">

                            <div class="strip-list" v-for="(doctor, index) in filteredResults" :key="index">
                                <div>
                                    Nome: {{doctor.name}} {{doctor.lastname}}
                                </div>

                                <div>
                                    Specializzazioni:
                                    <span v-for="(obj, index) in doctor.departments" :key="index">
                                        {{obj.type}}{{(index !== doctor.departments.length - 1) ? ',' : ''}}
                                    </span>
                                </div>

                                <figure class=" doctor-pic-dashboard-container">
                                    <a  :href="'doctor/'+ doctor.id">
                                        <img class="doctor-pic"  :src="'storage/' + doctor.detail.pic" alt="profile pic">
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
                checkedReview: '',

                results: [],
                filteredResults: [],
                filteredByVote: [],
                filteredByReviews: []
            }
        },

    mounted() {

    // All doctors data filtererd by homepage research

    const self = this;

    // Sostituiamo i + derivanti dalla query string per poter confrontare con i risultati
    while(this.searchedDepartment.includes('+')) {
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

        // Filtriamo i risultati per voto
        filterByVote: function () {
            this.filteredByVote = [];
            this.checkedReview = false;
            this.filteredByReviews = [];


            this.filteredResults.forEach(element => {

                element.votes.forEach(elem => {
                    if(elem.value === parseInt(this.checkedVote)) {
                        this.filteredByVote.push(element);
                    }
                });
            });
        },

        // Filtriamo i risultati per recensione
        filterByReviews: function() {
            this.checkedVote = '';
            this.filteredByVote = [];
            if (this.checkedReview) {

                if (this.filteredByVote.length > 0) {

                    this.filteredByVote.forEach(element => {
                        const reviewsNumber = element.reviews.length;

                        this.filteredByReviews.push(element);
                        this.filteredByReviews.sort((a, b) => (a.reviewsNumber > b.reviewsNumber) ? 1 : -1);
                    });

                } else {

                    this.filteredResults.forEach(element => {
                        const reviewsNumber = element.reviews.length;

                        this.filteredByReviews.push(element);
                        this.filteredByReviews.sort((a, b) => (a.reviewsNumber > b.reviewsNumber) ? 1 : -1);

                    });


                    console.log(this.filteredByReviews)

                }


            } else {
                this.filteredByReviews = [];
            }

        }
    }
}
</script>

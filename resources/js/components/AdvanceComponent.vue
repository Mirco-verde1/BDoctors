<template>

    <div class="container margin-top-container">

        <div class="row">

            <div class="col-lg-3">
                <!-- Filter results part -->
                <div v-if="results.length > 0">

                    <div class="filters">

                        <div>
                            <input type="radio" value="1" v-model="checkedVote">
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                        </div>

                        <div>
                            <input type="radio" value="2" v-model="checkedVote">
                            <span>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>

                        <div>
                            <input type="radio" value="3" v-model="checkedVote">
                            <span>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>

                        <div>
                            <input type="radio" value="4" v-model="checkedVote">
                            <span>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>

                        <div>
                            <input type="radio" value="5" v-model="checkedVote">
                            <span>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                        </div>

                        <button @click="filterByVote()">Applica Filtro</button>

                    </div>

                </div>
            </div>

            <div class="col-lg-8">
                <!-- mostriamo i risultati della ricerca tramite filtri  -->
                <div class="" v-if="checkedVotes.length > 0">

                    <div class="strip-list" v-for="(item,index) in checkedVotes" :key="index">
                        <div>
                            Nome: {{item.name}} {{item.lastname}}
                        </div>

                        <div v-for="(obj, index) in item.departments" :key="index">
                            Specializzazione: {{obj.type}}
                        </div>

                        <img class="doctor-pic" :src="item.detail.pic" alt="profile pic">

                    </div>

                </div>

                <!-- mostriamo i risultati della ricerca che saranno cliccabili per visualizzarne i dettagli  -->
                <div class="" v-if="checkedVotes.length === 0">

                    <h5 v-if="results.length === 0">Nessun risultato corrisponde ai tuoi criteri di ricerca.</h5>

                    <div class="strip-list" v-for="(doctor,index) in results" :key="index">
                        <div>
                            Nome: {{doctor.name}} {{doctor.lastname}}
                        </div>

                        <div v-for="(obj, index) in doctor.departments" :key="index">
                            Specializzazione: {{obj.type}}
                        </div>

                        <a :href="'doctor/'+ doctor.id">
                            <img class="doctor-pic" :src="doctor.detail.pic" alt="profile pic">
                        </a>

                    </div>
                </div>
            </div>

        </div>
        <!-- row -->
    </div>
    <!-- containe -->

</template>

<script>
    export default {

        data: function () {

            return {

                // Recupera la stringa JSON dallo storage locale e la trasforma in un oggetto JavaScript
                results: JSON.parse(localStorage.getItem('results')),


                checkedVote: '',
                checkedReview: '',

                checkedVotes: [],
                checkedReviews: [],


            }

        },

        methods: {

            //filter results by checkboxes
            filterByVote: function () {

                const self = this;

                self.checkedVotes = [];

                self.results.forEach(item => {

                    item.votes.forEach(el => {


                        if (el.value === parseInt(self.checkedVote)) {

                            self.checkedVotes.push(item)


                        }


                    });



                });


            },




        }

    }

</script>

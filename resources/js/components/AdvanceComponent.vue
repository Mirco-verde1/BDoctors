<template>

    <div class="container margin-top-container">

        <div class="row">

            <div class="col-lg-3">

                <!-- Filter results part -->
                <div v-if="results.length > 0">

                    <div class="filters">

                    <div @change="filterByVote(), reviewsOff()">
                        <input type="radio" value="1" v-model="checkedVote">
                        <span>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>

                    <div @change="filterByVote(), reviewsOff()">
                        <input type="radio" value="2" v-model="checkedVote">
                        <span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>

                    <div @change="filterByVote(), reviewsOff()">
                        <input type="radio" value="3" v-model="checkedVote">
                        <span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>

                    <div @change="filterByVote(), reviewsOff()">
                        <input type="radio" value="4" v-model="checkedVote" >
                        <span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>

                    <div @change="filterByVote(), reviewsOff()">
                        <input type="radio" value="5" v-model="checkedVote">
                            <span>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                    </div>

                <div>

                    <input type="checkbox" @change="filterByReviews()" value="" v-model="checkedReview"> <i class="far fa-edit"></i>Recensioni</div>

                </div>

            </div>
        </div>


        <div class="col-lg-8">

            <!-- mostriamo i risultati della ricerca tramite filtro per i voti -->
            <div class="" v-if="checkedVotes.length > 0 && totReviewDoctors.length === 0">

                <div class="strip-list" v-for="(item,index) in checkedVotes" :key="index">

                    <div>
                        Nome: {{item.name}} {{item.lastname}}
                    </div>

                    <div v-for="(obj, index) in item.departments" :key="index">
                        Specializzazione: {{obj.type}}
                    </div>


                    <a :href="'doctor/'+ item.id">
                        <img class="doctor-pic" :src="item.detail.pic" alt="profile pic">
                    </a>

                </div>

            </div>


                <!-- mostriamo i risultati della ricerca effettuata nella homepage -->

                <div v-if="checkedVotes.length === 0 && totReviewDoctors.length === 0">
                    <div class="strip-list" v-for="(doctor,index) in results" :key="index">

                        <div>
                            Nome: {{doctor.name}} {{doctor.lastname}}
                        </div>

                        <div v-for="(obj, index) in doctor.departments" :key="index">
                            Specializzazione: {{obj.type}}
                        </div>

                        <a :href="'doctor/' + doctor.id">
                            <img class="doctor-pic" :src="doctor.detail.pic" alt="profile pic">
                        </a>

                    </div>
                </div>


            <!-- mostriamo i risultati della ricerca tramite filtro per le reviews -->

            <div v-if="checkedVotes.length === 0 && totReviewDoctors.length > 0" >
                <div class="strip-list" v-for="(item, index) in totReviewDoctors" :key="index">
                    <div>
                        Nome: {{item.name}} {{item.lastname}}
                    </div>

                    <div v-for="(obj, index) in item.departments" :key="index">
                        Specializzazione: {{obj.type}}
                    </div>

                    <a :href="'doctor/'+ item.id">
                        <img class="doctor-pic" :src="item.detail.pic" alt="profile pic">
                    </a>
                </div>
            </div>


            </div>
        </div>

    </div>
    <!-- row -->

<!-- container -->

</template>

<script>
    export default {

        data: function () {

            return {

            // Recupera la stringa JSON dallo storage locale e la trasforma in un oggetto JavaScript
            results: JSON.parse(localStorage.getItem('results')),


            checkedVote: '',
            checkedReview: '',

            checkedVotes:[],
            totReviewDoctors:[],

        }
    },

    methods: {

        // Filter results by votes
        filterByVote: function () {
            const lastItem = window.location.search.substring(window.location.search.lastIndexOf('=') + 1)
            console.log(lastItem);

            this.checkedVotes = [];
            this.results.forEach(item => {

                item.votes.forEach(el => {
                    if (el.value === parseInt(this.checkedVote)) {
                        this.checkedVotes.push(item);
                        this.checkedReview = false;
                    }
                });
            });
        },

        // Filter results by reviews
        filterByReviews: function() {

            if (this.checkedReview) {
                this.totReviewDoctors = [];

                this.results.forEach(element => {
                    const reviewsNumber = element.reviews.length;

                    this.totReviewDoctors.push(element);

                    this.totReviewDoctors.sort((a, b) => (a.reviewsNumber > b.reviewsNumber) ? 1 : -1);
                });

                this.totReviewDoctors.reverse();

            }
            else{
                this.totReviewDoctors = [];

                this.results.forEach(element => {

                    this.totReviewDoctors.push(element);
                     })
            }

        },


        reviewsOff: function() {
            if(this.totReviewDoctors.length > 0) {
                this.totReviewDoctors = [];
            }
        },
    }
}

</script>

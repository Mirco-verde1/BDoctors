            <template>

                <div class="container margin-top-container">

                    <div class="row">

                        <div class="col-lg-3 col-md-8">
                            <div class="box-general">
                                <div class="profile">
                                    <!-- Filter results part -->
                                    <div v-if="resultsFiltered.length > 0">

                                        <div class="filters">
                                            <b>Filtra per:</b>
                                            <hr>

                                            <small>Voti</small>

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

                                            <small>Recensioni</small>

                                            <div>
                                                <input type="checkbox" @change="filterByReviews()" value="" v-model="checkedReview">
                                                <i class="far fa-edit"></i>Recensioni
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fine colonna di sinistra -->

                        <div class="col-lg-9 col-md-8">
                            <div class="box-general">
                                <div class="">

                                    <!-- mostriamo i risultati della ricerca tramite filtro per i voti -->
                                    <div v-if="checkedVotes.length > 0 && totReviewDoctors.length === 0">

                                        <div class="strip-list" v-for="(item,index) in checkedVotes" :key="index">

                                            <div>
                                                Nome:{{item.name}} {{item.lastname}}
                                            </div>

                                            <div v-for="(obj, index) in item.departments" :key="index">
                                                Specializzazione: {{obj.type}}
                                            </div>

                                            <figure class=" doctor-pic-dashboard-container">
                                                <a  :href="'doctor/'+ item.id">
                                                    <img class="doctor-pic" :src="'storage/' + item.detail.pic" alt="profile pic">
                                                </a>
                                            </figure>

                                        </div>

                                    </div>

                                    <!-- mostriamo i risultati della ricerca effettuata nella homepage -->

                                    <!-- <div v-if="checkedVotes.length === 0 && totReviewDoctors.length === 0">
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
                                         </div> -->


                                    <!-- mostriamo i risultati della ricerca tramite filtro per le reviews -->

                                    <div v-if="checkedVotes.length === 0 && totReviewDoctors.length === 0" >

                                        <div class="strip-list" v-for="(item, index) in resultsFiltered" :key="index">
                                            <div>
                                                Nome: {{item.name}} {{item.lastname}}
                                            </div>

                                            <div v-for="(obj, index) in item.departments" :key="index">
                                                Specializzazione: {{obj.type}}
                                            </div>

                                            <figure class=" doctor-pic-dashboard-container">
                                                <a  :href="'doctor/'+ item.id">
                                                    <img class="doctor-pic"  :src="'storage/' + item.detail.pic" alt="profile pic">
                                                </a>
                                            </figure>

                                        </div>
                                    </div>
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

                        checkedVote: '',
                        checkedReview: '',

                        checkedVotes:[],
                        totReviewDoctors:[],
                        lastItem:window.location.search.substring(window.location.search.lastIndexOf('=') + 1),
                        results:[],
                        resultsFiltered:[],
                        test:[],


                    }
                },

                mounted() {

                // All doctors data filtererd by homepage research

                const self = this;

                while(self.lastItem.includes('+')){

                        self.lastItem = self.lastItem.replace('+', ' '); };



                axios.get('http://127.0.0.1:8000/api/doctors', {

                    params: {

                            },
                })

                .then((resp) => {


                self.results = resp.data;


                    self.results.data.forEach(element => {

                        element.departments.forEach(item => {



                            if(item.type === self.lastItem){



                                self.resultsFiltered.push(element);

                            }

                        });

                    });

                });



                },

                methods: {

                    filterByVote: function () {

                    const self = this;

                        while(self.lastItem.includes('+')){

                        self.lastItem = self.lastItem.replace('+', ' '); };

                    axios.get('http://127.0.0.1:8000/api/doctors', {

                    params: {

                             vote:self.checkedVote,

                            },

                }) .then((resp) => {


                self.results = resp.data;
                self.checkedVotes = [],

                    self.results.data.forEach(element => {

                        element.departments.forEach(item => {



                            if(item.type === self.lastItem){


                               element.votes.forEach(elem => {

                                    if(elem.value === parseInt(self.checkedVote)){



                                        self.checkedVotes.push(element);
                                    }
                               })






                            }

                        });

                    });

                });
                    },




                    // Filter results by reviews
                    filterByReviews: function() {

                         const self = this;

                        while(self.lastItem.includes('+')){

                        self.lastItem = self.lastItem.replace('+', ' '); };

                    axios.get('http://127.0.0.1:8000/api/doctors', {

                    params: {

                             vote:self.checkedVote,

                            },

                }).then((resp) => {


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





                });



                    },


                    reviewsOff: function() {
                        if(this.totReviewDoctors.length > 0) {
                            this.totReviewDoctors = [];
                        }
                    },




                }
            }

            </script>

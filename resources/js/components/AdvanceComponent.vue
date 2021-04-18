<template>

  <div class="container">

      <div class="row">

        <!-- mostriamo i risultati della ricerca che saranno cliccabili per visualizzarne i dettagli  -->
        <div class="results" v-if="checkedVotes.length === 0">

          <h5 v-if="results.length === 0">Nessun risultato corrisponde ai tuoi criteri di ricerca.</h5>

          <div v-for="(doctor,index) in results" :key="index">

            Nome: {{doctor.name}} {{doctor.lastname}}


            <div v-for="(obj, index) in doctor.departments" :key="index">
              Specializzazione: {{obj.type}}
            </div>

            <a :href="'doctor/'+ doctor.id">

              <img :src="doctor.detail.pic" alt="profile pic">

            </a>

          </div>
        </div>

        <!-- mostriamo i risultati della ricerca tramite filtri  -->
        <div v-if="checkedVotes.length > 0">

          <div v-for="(item,index) in checkedVotes" :key="index">
            Nome: {{item.name}} {{item.lastname}}

            <div v-for="(obj, index) in item.departments" :key="index">
              Specializzazione: {{obj.type}}
            </div>

            <img :src="item.detail.pic" alt="profile pic">

          </div>

        </div>

        <!-- Filter results part -->
        <div v-if="results.length > 0">

          <div class="filters">

  <div> <input type="radio"  value="1" v-model="checkedVote"> <span>vote 1</span></div>
  <div> <input type="radio"  value="2" v-model="checkedVote"> <span>vote 2</span></div>
  <div> <input type="radio"  value="3" v-model="checkedVote"> <span>vote 3</span></div>
  <div> <input type="radio"  value="4" v-model="checkedVote"> <span>vote 4</span></div>
  <div> <input type="radio"  value="5" v-model="checkedVote"> <span>vote 5</span></div>



    <button @click="filterByVote(),averageByReviews()">Applica Filtro</button>


  </div>

            <button @click="filterByVote()">Applica Filtro</button>

          </div>

        </div>

      </div>

  </div>

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
        defaultReviews:3,
        totReviewDoctor:[],

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


      averageByReviews:function(){
       const self = this;

         self.results.forEach(element => {

            const b = element;
             const a = element.reviews.length;

             console.log(a);

               if(a >= self.defaultReviews){

                  self.totReviewDoctor.push(b);

          }

         });

         return self.totReviewDoctor;
      },





    }

  }

</script>

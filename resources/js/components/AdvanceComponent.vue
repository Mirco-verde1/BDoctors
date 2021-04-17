<template>

  <div>

    <div class="container">

      <div class="row">

        <h5 v-if="results.length === 0">Nessun risultato corrisponde ai tuoi criteri di ricerca.</h5>

        <div v-for="(doctor,index) in results" :key="index">
          Nome: {{doctor.name}} {{doctor.lastname}}

          <div v-for="(obj, index) in doctor.departments" :key="index">
            Specializzazione: {{obj.type}}
          </div>

          <img :src="doctor.detail.pic" alt="profile pic">

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

      }

    },

    methods: {

    }

  }

</script>

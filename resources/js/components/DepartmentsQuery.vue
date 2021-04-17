<template>

  <div>
      <!-- ciclo dentro all'array allDepartments -->
    <div v-for="(dep, index) in allDepartments" :key="index" >
        <!-- secondo ciclo per rilevare la specializzazione -->
        <div v-for="(det, index) in dep" :key="index" class="card" style="width: 18rem;">
            <!-- terzo ciclo per rilevare il nome della specializzazione -->
            <div v-for="(name, index) in det.departments" :key="index">
                <p>{{name.type}}</p>

            </div>
        </div>
    </div>

  </div>

</template>

<script>
  export default {

    data: function () {

      return {

        allDepartments: []

      }

    },

    methods: {

    },

    mounted() {

      // All doctors data
      const self = this;

      axios.get('http://127.0.0.1:8000/api/doctors', {
        params: {

          query: self.searching,

        },
      })
      .then((resp) => {
        self.allDepartments = resp.data;
      });


      'use strict';


    }

  }

</script>

<style scoped>
  .search {
    display: flex;
  }

  .search-left {
    display: flex;
    flex-direction: column;
  }

  .invalid-message {
    font-size: 10px;
  }
</style>

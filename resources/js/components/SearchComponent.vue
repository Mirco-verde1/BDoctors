<template>
    <div class="container">

      <div class="form-inline">
        <form action="/advance" class="needs-validation" novalidate>
          <div class="search">
            <div class="search-left">
            <div class="input-wrap">
              <input class="form-control mr-sm-2" :class="searching && !validateQuery() ? 'is-invalid' : ''" placeholder="Search" type="text" name="" id="" v-model="searching"
              aria-label="Search">
              <i class="fas fa-search"></i>
              </div>
              <div class="invalid-feedback">
                <span class="invalid-message">Il formato non è valido</span>
              </div>
            </div>

            <button type="submit" class="query-submit btn btn-outline-success my-2 my-sm-0" @click="searchDepartment()">
            Cerca specializzazione
            </button>
         </div>
        </form>
      </div>

    </div>

</template>

<script>
  export default {

    data: function () {

      return {

        allInfo: [],

        results: [],

        searching: ''

      }

    },

    methods: {

      // Validazione ricerca utente
      validateQuery: function () {
        const query = this.searching;

        if (isNaN(query)) {
          return true;
        } else {
          return false;
        }
      },

      // Ricerca departments homepage
      searchDepartment: function () {
        const self = this;
        self.results = [];

        self.allInfo.data.forEach(elem => {
          elem.departments.forEach(item => {
            if (item.type.toLowerCase().includes(self.searching.toLowerCase())) {
              return self.results.push(elem);
            }
          });

          // Salva in locale la stringa JSON dei risultati
          localStorage.setItem('results', JSON.stringify(self.results));

        });
      }

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
        self.allInfo = resp.data;
      });


      'use strict';

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation');

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!self.validateQuery()) {
              event.preventDefault()
              event.stopPropagation()
            }
          }, false)
        });
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

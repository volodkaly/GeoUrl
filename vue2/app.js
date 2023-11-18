new Vue({
    el: '#app',
    data: {
        name:'Peter',
        job: 'dev'
    },
    methods: {
        greet: function() {
            return 'Hello my name is ' + this.name;
        }
    }
})
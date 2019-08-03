<template>
    <div class="container">
        <button class="btn btn-success ml-4"  v-text="buttonText" @click="followuser"></button>
    </div>
</template>

<script>
    export default {
        props : ['userId' , 'follows'],  //camelcased notation, go through the documentation

        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return {
                status: this.follows,
            };

        },

        methods: {
            followuser(){

                axios.post('/follow/' + this.userId )
                    .then(response =>{
                        // alert(response.data);
                        this.status = !this.status;
                        console.log(response.data);
                    })

                    .catch(errors => {
                       if(errors.response.status ==401)
                           window.location = '/login';
                    });
            }
        },

        computed: {
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>

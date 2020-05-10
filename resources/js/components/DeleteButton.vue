<template>
    <div>
        <button class="btn btn-danger" @click="confirmDelete">Delete</button>
    </div>
</template>

<script>
    export default {
        name: "DeleteButton",
        props: ['deleteRoute', 'indexRoute'],
        methods: {
            confirmDelete() {
                //Confirm box to delete
                if (confirm("Are you sure?"))
                {
                    //Call the destroy method of the lab
                    axios.delete(this.deleteRoute).then(response => {
                        //Redirect to the index view page
                        window.location = this.indexRoute;
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>

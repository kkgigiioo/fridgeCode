<template>
    <div>
        <navbar :app ="this"></navbar>

        <router-view/>
    </div>    
</template>

<script>
import Navbar from './Navbar';

export default {
    name: 'app',
    components: {
        Navbar
    },
    data() {
        return {
            user: null,
            loading: false,
            initiated: false,
            req: axios.created({
                baseUrl: BASE_URL
            })
        };
    }
}
</script>

<style>

</style>
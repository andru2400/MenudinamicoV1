<template>
    <footer class="app-footer">
        <div>
        <a href="https://coreui.io">
            Colombia News</a>
        <span>&copy; 2019
            News From Colombia And The World</span>
        </div>
        <div class="ml-auto">
        <span>Powered by</span>
        <a href="">ColombiaNews</a>
        </div>
    </footer>
</template>

<script>
    export default {
        props: ['asset'],
        mounted() {
            console.log(this.assetHeader)
        },
        data () {
            return {
                assetHeader: this.asset
            }
        },
        created: function() {

        },
        methods: {
        }
    }
</script>

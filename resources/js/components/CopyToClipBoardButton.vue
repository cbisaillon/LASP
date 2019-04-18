<template>
    <button @click="clicked" class="btn btn-outline-primary h-fit d-inline-flex align-items-center">
        <span class="mr-2">{{title}}</span>
        <i class="far fa-copy"></i>
    </button>
</template>

<script>
    export default {
        name: "CopyToClipBoardButton",
        props: {
            title: {
                type: String,
                required: true,
            },
            toCopy: {
                type: String,
                required: true,
            }
        },
        methods: {
            clicked: function() {
                toastr.clear()
                toastr.info('Reference copied to clipboard');
                this.copyToClipboard(this.toCopy)

            },
            copyToClipboard: function(str){
                const el = document.createElement('textarea');
                el.value = str;
                document.body.appendChild(el);
                el.select();
                document.execCommand('copy');
                document.body.removeChild(el);
            }
        }
    }
</script>

<style scoped>

</style>
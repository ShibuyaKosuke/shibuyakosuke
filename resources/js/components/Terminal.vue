<template>
    <pre class="terminal">{{ contents }}</pre>
</template>

<script>
export default {
    name: 'terminal',
    props: [
        'contents'
    ],
    mounted() {
        console.log('terminal mounted.')
    }
}
</script>

<style scoped>
.terminal {
    width: auto;
    border: 1px solid #000;
    color: white;
    background-color: #1b1818;
    text-align: left;
    padding: 1rem;
}
</style>

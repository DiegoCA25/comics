<script setup>
import Form from './Form.vue';
const props = defineProps({
    escritors:{type:Object},
    comic:{type:Object},
    escritorsOfComic:{type:Object}
});
</script>

<template>
    <Form :escritors="escritors" :comic="comic" :escritorsOfComic="escritorsOfComic"/>
</template>
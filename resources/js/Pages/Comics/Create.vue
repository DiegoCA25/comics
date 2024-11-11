<script setup>
import Form from './Form.vue';
const props = defineProps({
    escritors:{type:Object}
});
</script>

<template>
    <Form :escritors="escritors" />
</template>
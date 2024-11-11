<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import DarkButton from '@/Components/DarkButton.vue';

const props = defineProps({
    comic:{type:Object},escritors:{type:Object}
});
</script>
<template>
    <Head title="Comic" />
    <AuthenticatedLayout>
		<template #header>
			<div class="inline-flex overflow-hidden mb-4 w-full">
                {{ comic.title }}
                <NavLink :href="route('comics.index')">
                    <DarkButton>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </DarkButton>
                </NavLink>
            </div>
		</template>
        <div class="grid gap-6 bg-white mb-8 md:grid-cols-2 border rounded-lg">
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <p>Descripcion: <span class="text-gray-900 font-semibold">{{ comic.description }}</span></p>
                <p>ISBN: <span class="text-gray-900 font-semibold">{{ comic.isbn }}</span></p>
                <p>Escritor: <span v-for="a,i in escritors" class="text-gray-900 font-semibold">
                    <a v-if="i == escritors.length-1">{{ a.last_name+' '+a.name }}</a>
                    <a v-else>{{ a.last_name+' '+a.name+', ' }}</a>
                </span>
                </p>
                <p>Publicador: <span class="text-gray-900 font-semibold">{{ comic.publisher }}</span></p>
                <p>Fecha de lanzamiento: <span class="text-gray-900 font-semibold">{{ comic.release_date }}</span></p>
                <p>Paginas: <span class="text-gray-900 font-semibold">{{ comic.pages }}</span></p>
            </div>
            <div class="min-w-0 p-4 rounded-lg shadow-xs">
                <img :src="'../storage'+comic.image" :alt="comic.title" width="500">
            </div>
        </div>
    </AuthenticatedLayout>
</template>
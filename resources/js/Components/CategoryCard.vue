<template>
	<Link
		:href="route('category-detail', category.slug)"
		class="relative h-32 overflow-hidden rounded-3xl shadow-lg"
	>
		<img :src="'/storage/' + category.image" alt="" class="object-cover" />

		<h2
			class="absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2 bg-primary/70 py-4 text-center font-bold text-white"
		>
			{{ category.name }}
		</h2>
	</Link>
</template>

<script setup>
const props = defineProps(["category"]);
// category img
// category name
// category slug
</script>

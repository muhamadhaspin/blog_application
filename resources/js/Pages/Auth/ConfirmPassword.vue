<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import AuthButton from "@/Components/AuthButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import FormCard from "@/Components/FormCard.vue";

const form = useForm({
	password: "",
});

const submit = () => {
	form.post(route("password.confirm"), {
		onFinish: () => form.reset(),
	});
};
</script>

<template>
	<Head title="Confirm Password" />

	<FormCard @submit.prevent="submit">
		<div class="mb-4 text-sm text-primary">
			This is a secure area of the application. Please confirm your
			password before continuing.
		</div>

		<div>
			<InputLabel for="password" value="Password" />
			<TextInput
				id="password"
				type="password"
				class="mt-1 block w-full"
				v-model="form.password"
				required
				autocomplete="current-password"
				autofocus
			/>
			<InputError class="mt-2" :message="form.errors.password" />
		</div>

		<div class="mt-4 flex justify-end">
			<AuthButton
				class="ml-4"
				:class="{ 'opacity-25': form.processing }"
				:disabled="form.processing"
			>
				Confirm
			</AuthButton>
		</div>
	</FormCard>
</template>

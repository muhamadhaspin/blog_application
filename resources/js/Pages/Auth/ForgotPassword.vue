<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import AuthButton from "@/Components/AuthButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import FormCard from "@/Components/FormCard.vue";

defineProps({
	status: String,
});

const form = useForm({
	email: "",
});

const submit = () => {
	form.post(route("password.email"));
};
</script>

<template>
	<Head title="Forgot Password" />

	<div v-if="status" class="mb-4 text-sm font-medium text-green-600">
		{{ status }}
	</div>

	<FormCard @submit.prevent="submit">
		<div class="mb-4 text-sm text-primary">
			Forgot your password? No problem. Just let us know your email
			address and we will email you a password reset link that will allow
			you to choose a new one.
		</div>

		<div>
			<InputLabel for="email" value="Email" />
			<TextInput
				id="email"
				type="email"
				class="mt-1 block w-full"
				v-model="form.email"
				required
				autofocus
				autocomplete="username"
			/>
			<InputError class="mt-2" :message="form.errors.email" />
		</div>

		<div class="mt-4 flex items-center justify-end">
			<AuthButton
				:class="{ 'opacity-25': form.processing }"
				:disabled="form.processing"
			>
				Email Password Reset Link
			</AuthButton>
		</div>
	</FormCard>
</template>

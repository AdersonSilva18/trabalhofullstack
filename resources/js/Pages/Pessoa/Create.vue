<template>
    <Layout>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="nome" value="Nome"/>

                <TextInput
                    id="nome"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.nome"
                    required
                    autofocus
                    autocomplete="nome"
                />

                <InputError class="mt-2" :message="form.errors.nome"/>
            </div>
            <div class="mt-4">
                <InputLabel for="cpf" value="CPF"/>

                <TextInput
                    id="cpf"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.cpf"
                    required
                    autofocus
                    autocomplete="cpf"
                />

                <InputError class="mt-2" :message="form.errors.cpf"/>
            </div>
            <div class="mt-4">
                <InputLabel for="telefone" value="Telefone"/>

                <TextInput
                    id="telefone"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.telefone"
                    required
                    autofocus
                    autocomplete="telefone"
                />

                <InputError class="mt-2" :message="form.errors.telefone"/>
            </div>
            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Criar
                </PrimaryButton>
            </div>
        </form>
    </Layout>
</template>

<script setup>
import {onMounted} from "vue";
import {Link, useForm} from "@inertiajs/vue3";
import Layout from "@/Layouts/Layout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    pessoa: {
        type: Object,
        default: null,
    },
    isUpdating: {
        type: Boolean,
        default: false,
    },
});

const form = useForm({
    nome: "",
    cpf: "",
    telefone: "",
});

const submit = () => (props.isUpdating ? updatePost() : addPost());
const addPost = () => form.post("/pessoas");
const updatePost = () => form.put(`/pessoas/${props.pessoa.id}`);
onMounted(() => {
    if (props.pessoa) {
        form.nome = props.pessoa.nome;
        form.cpf = props.pessoa.cpf;
        form.telefone = props.pessoa.telefone;
    }
});
</script>
<style lang="scss" scoped></style>

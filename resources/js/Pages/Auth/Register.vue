<script setup>

// const form = useForm({
//     name: '',
//     email: '',
//     password: '',
//     password_confirmation: '',
//     terms: false,
// });

// const submit = () => {
//     return false;
//     form.post(route('register'), {
//         onFinish: () => form.reset('password', 'password_confirmation'),
//     });
// };


</script>

<script>
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import Multiselect from '@vueform/multiselect';

    export default {
        components: {
            Multiselect,
        },
        data() {
            return {
                value: [],
                colors: [],
                form : useForm({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                }),
                options: [
                    { value: '#405fb8', name: 'Lapis Lazuli', color: '#405fb8' },
                    { value: '#6ba994', name: 'Green Sheen', color: '#6ba994' },
                    { value: '#e48bf8', name: 'Shocking Pink', color: '#e48bf8' },
                    { value: '#938d4a', name: 'Gold Fusion', color: '#938d4a' },
                    { value: '#933977', name: 'Plum', color: '#933977' },
                    { value: '#ff1423', name: 'Torch Red', color: '#ff1423' },
                    { value: '#5d89ac', name: 'Horizon', color: '#5d89ac' },
                ]
            }
        },
        methods:{
            submitForm(){
                const param = {
                    name: this.form.name,
                    email: this.form.email,
                    password: this.form.password,
                    password_confirmation: this.form.password_confirmation,
                    terms: this.form.terms,
                    colors: this.colors,
                }
                axios.post('/registrar-nuevo-usuario',param).then(res=>{
                    this.form.reset('password', 'password_confirmation');
                    window.location = "/login";
                });
                return;
                form.post(route('register'), {
                    onFinish: () => form.reset('password', 'password_confirmation'),
                })  
            }
        }
    }
</script>

<style src="@vueform/multiselect/themes/default.css"></style>

<style>
    .multiselect-tag.is-user {
        padding: 5px 8px;
        background: #35495e;
        margin: 3px 3px 8px;
    }

    .multiselect-tag.is-user img {
        width: 18px;
        height: 18px;
        margin-right: 8px;
        border: 2px solid #ffffffbf;
    }

    .multiselect-tag.is-user i:before {
        color: #ffffff;
    }

    .user-image {
        margin: 0 6px 0 0;
        height: 22px;
    }
</style>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submitForm">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            
            <div class="mt-4">
                <InputLabel for="Favorite Colors" value="Favorite Colors (Max 3 colors)"/>
                <Multiselect 
                        max="3" 
                        v-model="colors"
                        mode="tags"
                        placeholder="Select 3 colors"
                        track-by="image"
                        label="name"
                        :close-on-select="false"
                        :search="true"
                        :options="options"
                        required
                    >
                    <template v-slot:tag="{ option, handleTagRemove, disabled }">
                        <div class="multiselect-tag is-user" :class="{ 'is-disabled': disabled }">
                            <div :style="'background:'+option.color+';width:30px;height:30px;margin-right:10px'"></div>
                            {{ option.name }}
                            <span v-if="!disabled" class="multiselect-tag-remove" @mousedown.prevent="handleTagRemove(option, $event)">
                                <span class="multiselect-tag-remove-icon"></span>
                            </span>
                        </div>
                    </template>

                    <template v-slot:option="{ option }">
                        <div :style="'background:'+option.color+';width:30px;height:30px;margin-right:10px'"></div>
                        <span>{{option.name}} - {{option.color}}</span>
                        <!-- <img class="character-option-icon" :src="option.image"> {{ option.name }} -->
                    </template>
                </Multiselect>
            </div>
            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

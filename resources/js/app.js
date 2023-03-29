import './bootstrap';
import 'flowbite';


import { createApp } from 'vue';
import OtpInput from './components/OtpInput.vue';

const app = createApp({});
app.component('OtpInput', OtpInput);

app.mount('root');
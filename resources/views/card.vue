<template>
        <VCreditCard @cardChanged="cardChanged"/>
  
</template>

<script>
import VCreditCard from 'v-credit-card';
import 'v-credit-card/dist/VCreditCard.css';

const translations = {
    name: {
        label: 'Nombre',
        placeholder: 'Nombre completo'
    },
    card: {
        label: 'Número de tarjeta',
        placeholder: 'Número de tarjeta'
    },
    expiration: {
        label: 'Expiration'
    },
    security: {
        label: 'Código de seguridad',
        placeholder: 'Código'
    }
};

export default {
    data() {
        return {
            translations
        };
    },
    components: {
        VCreditCard
    }
}
</script>



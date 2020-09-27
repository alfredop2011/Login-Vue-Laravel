<template>
<div>
  <h1 class="text-center">Welcome DASHBOARD</h1>
    <vue-3d-menu title="MENU" :items="items"></vue-3d-menu>
</div>
</template>
<script>
export default {
    data() {
        let items = [
            'Card-Visa' ,
            'upload',
            'chat-vue',
            '→_→'
        ].map(item => ({ 
          title: item, 
          click: () =>  this.$router.push({ name: item }) }));

    
        return {
            items
        };
    }
};
</script>
<style>
html,
body {
    margin: 0;
    padding: 0;
}
body {
    background: #e8d0ca url(https://i.loli.net/2018/04/07/5ac8505922be2.jpg)
        no-repeat;
    background-position: center top;
}
#dashboard {
    float: left;
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #2c3e50;
}
</style>
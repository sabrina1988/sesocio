<template>
    <div>
        <h1>Sesocio Test</h1>
        <p>
            <router-link :to="{ name: 'Home' }">Home</router-link> |
            <router-link :to="{ name: 'Users' }">Users</router-link> |
            <router-link :to="{ name: 'UsersRole' }">Users Same Role</router-link> |
            <router-link :to="{ name: 'RolesUser' }">Roles Same User</router-link>
        </p>         
    </div>            
     
</template>

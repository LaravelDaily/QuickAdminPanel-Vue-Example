<template>
  <button type="button" class="btn btn-default" @click="$router.go(-1)">
    <i class="material-icons">arrow_back</i>
    {{ $t('global.back') }}
  </button>
</template>

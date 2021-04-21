<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            }
          ]
        },
        {
          title: 'cruds.contactManagement.title',
          icon: 'import_contacts',
          path: { name: 'contact_management' },
          gate: 'contact_management_access',
          children: [
            {
              title: 'cruds.contactCompany.title',
              icon: 'fas fa-building',
              path: { name: 'contact_companies.index' },
              gate: 'contact_company_access'
            },
            {
              title: 'cruds.contactContact.title',
              icon: 'fas fa-user-plus',
              path: { name: 'contact_contacts.index' },
              gate: 'contact_contact_access'
            }
          ]
        },
        {
          title: 'cruds.transaction.title',
          icon: 'table_view',
          path: { name: 'transactions.index' },
          gate: 'transaction_access'
        }
      ]
    }
  }
}
</script>

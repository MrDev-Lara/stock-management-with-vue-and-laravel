let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forgetpassword.vue').default;
let home = require('./components/home.vue').default;
let logout = require('./components/auth/logout.vue').default;

//employee
let createemployee = require('./components/employee/create.vue').default;
let employee = require('./components/employee/index.vue').default;
let update_employee = require('./components/employee/edit.vue').default;

//supplier
let createsupplier = require('./components/Supplier/create.vue').default;
let supplier = require('./components/supplier/index.vue').default;
let update_supplier = require('./components/supplier/edit.vue').default;

//customer
let createcustomer = require('./components/Customer/create.vue').default;
let customer = require('./components/Customer/index.vue').default;
let update_customer = require('./components/Customer/edit.vue').default;

//catagory
let createcatagory = require('./components/Catagory/create.vue').default;
let catagory = require('./components/Catagory/index.vue').default;
let update_catagory = require('./components/Catagory/edit.vue').default;

//product
let createproduct = require('./components/Product/create.vue').default;
let product = require('./components/Product/index.vue').default;
let update_product = require('./components/Product/edit.vue').default;

//expense
let createexpense = require('./components/Expense/create.vue').default;
let expense = require('./components/Expense/index.vue').default;
let update_expense = require('./components/Expense/edit.vue').default;
let monthlyexpense = require('./components/Expense/monthlyexpense.vue').default;

//salarys
let give_salary = require('./components/salary/create.vue').default;
let allsalary = require('./components/salary/allsalary.vue').default;
let paysalary = require('./components/salary/paysalary.vue').default;
let view_salary = require('./components/salary/viewsalary.vue').default;

//stock
let stock = require('./components/Product/stock.vue').default;
let editstock = require('./components/Product/editstock.vue').default;

//
let pos = require('./components/pos/pointofsale.vue').default;

export const routes = [
  { path: '/', component: login,name: '/'},
  { path: '/register', component: register,name: 'register' },
  { path: '/forget', component: forget },
  { path: '/home', component: home, name: 'home' },
  { path: '/logout', component: logout, name: 'logout' },


  { path: '/create_employee', component: createemployee },
  { path: '/employee', component: employee,name: 'employee'  },
  { path: '/update_employee/:id', component: update_employee, name: 'update_employee' },


  { path: '/create_supplier', component: createsupplier},
  { path: '/supplier', component: supplier,name: 'supplier' },
  { path: '/update_supplier/:id', component: update_supplier, name: 'update_supplier' },


  { path: '/create_customer', component: createcustomer},
  { path: '/customer', component: customer,name: 'customer' },
  { path: '/update_customer/:id', component: update_customer, name: 'update_customer' },


  { path: '/create_catagory', component: createcatagory},
  { path: '/catagory', component: catagory,name: 'catagory' },
  { path: '/update_catagory/:id', component: update_catagory, name: 'update_catagory' },


  { path: '/create_product', component: createproduct},
  { path: '/product', component: product,name: 'product' },
  { path: '/update_product/:id', component: update_product, name: 'update_product' },


  { path: '/create_expense', component: createexpense},
  { path: '/expense', component: expense,name: 'expense' },
  { path: '/update_expense/:id', component: update_expense, name: 'update_expense' },
  { path: '/monthlyexpense', component: monthlyexpense},


  { path: '/give_salary', component: give_salary},
  { path: '/allsalary', component: allsalary,name: 'allsalary' },
  { path: '/pay-salary/:id', component: paysalary, name: 'pay-salary' },
  { path: '/view-salary/:id', component: view_salary, name: 'view-salary' },


  { path: '/stock', component: stock,name: 'stock' },
  { path: '/edit-stock/:id', component: editstock, name: 'edit-stock' },

  { path: '/pos', component: pos,name: 'pos' },
]
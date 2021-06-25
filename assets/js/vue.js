// data
const products = [
  { id: 1, description: "Oeil", price: 500000, img: 'assets/img/Oeil-Droit.jpg'},
  { id: 2, description: 'Coeur', price: 1000000, img: 'assets/img/coeur.jpg'},
  { id: 3, description: 'Poumon', price: 500000, img: 'assets/img/poumon.jpg'},
  { id: 4, description: 'Jambe', price: 1000, img: 'assets/img/jambe.jpg'},
  { id: 5, description: 'Nez', price: 500, img: 'assets/img/nez.jpg'},
  { id: 6, description: 'Jambe ++', price: 1000000, img: 'assets/img/jambe+.jpg'},
  { id: 7, description: 'Oreille Droite', price: 100, img: 'assets/img/oreilleDroite.jpg'},
  { id: 8, description: 'Oreille Gauche', price: 100, img: 'assets/img/oreilleGauche.jpg'},
  { id: 9, description: 'Paire de Pieds', price: 200, img: 'assets/img/pieds.jpg'},
  { id: 10, description: 'Foie', price: 5000, img: 'assets/img/foie.jpg'},
];

const Home = {
  template: '#home',
  name: 'Home',
  data: () => {
    return {
      products,
      searchKey: '',
      liked: [],
      cart: []
    }
  },
  computed: {
    filteredList(){
      return this.products.filter((product) => {
        return product.description.toLowerCase().includes(this.searchKey.toLowerCase());
      })
    },
    getLikeCookie(){
      let cookieValue = JSON.parse($cookies.get('like'));
      cookieValue == null ? this.liked = [] : this.liked = cookieValue
    },
    cartTotalAmount(){
      let total = 0;
      for (let item in this.cart){
        total = total + (this.cart[item].quantity * this.cart[item].price)
      }
      return total;
    },
    itemTotalAmount(){
      let itemTotal = 0;
      for (let item in this.cart){
        itemTotal = itemTotal + (this.cart[item].quantity);          
      }
      return itemTotal;
    }
  },
  methods: {
    setLikeCookie(){
      document.addEventListener('input', () => {
        setTimeout(() => {
          $cookies.set('like', JSON.stringify(this.liked));
        }, 300);
      })
    },
    addToCart(product){
      // check if already in array
      for (let i = 0; i < this.cart.length; i++){
        if (this.cart[i].id === product.id) {
          return this.cart[i].quantity++
        }
      }
      this.cart.push({
        id: product.id,
        img: product.img,
        description: product.description,
        price: product.price,
        quantity: 1
      })
    },
    cartPlusOne(product){
      product.quantity = product.quantity + 1;
    },
    cartMinusOne(product, id){
      if (product.quantity == 1) {
        this.cartRemoveItem(id);
      } else {
        product.quantity = product.quantity -1;
      }
    },
    cartRemoveItem(id){
      this.$delete(this.cart, id)
    }
  },
  mounted: () => {
    this.getLikeCookie;
  }
}
const UserSettings = {
  template: '<h1>User Settings</h1>',
  name: 'UserSettings'
}
const WishList = {
  template: '<h1>Wish List</h1>',
  name: 'WishList'
}
const ShoppingCart = {
  template: '<h1>Shopping Cart</h1>',
  name: 'ShoppingCart'
}

// router
const router = new VueRouter({
  routes: [
    { path: '/', component: Home, name: 'Home' },
    { path: '/user-settings', component: UserSettings, name : 'UserSettings' },
    { path: '/wish-list', component: WishList, name: 'WishList' },
    { path: '/shopping-cart', component: ShoppingCart, name: 'ShoppingCart' },
  ]
})

const vue = new Vue({
  router
}).$mount('#app');

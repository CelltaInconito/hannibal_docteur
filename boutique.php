
<?php 
  require_once "navbar.php";
?>


    <!-- home template component -->
    <script type="text/x-template" id="home">
      <div class="home-container">
        <h1>Articles</h1>

        <!-- search display -->
        <input v-model="searchKey" id="search" type="search" placeholder="Rechercher..." autocomplete="off">
        <span v-if="searchKey && filteredList.length >= 1 ">
          {{filteredList.length}} resultat<span v-if="filteredList.length >= 2">s</span>
        </span>

        <!-- cards display -->
        <div class="card-cart-container">
          <div class="card-container">
            <div v-for="product in filteredList" class="card">

              <div class="img-container">
                <img v-bind:src='product.img' />
              </div>

              <div class="card-text">
                <h3>{{ product.description }}</h3>
                <span>{{ product.price }}€</span>
              </div>

              <div class="card-icons">
                <div class="like-container">
                  <input
                    type="checkbox"
                    :value=product.id
                    name="checkbox"
                    v-bind:id="product.id"
                    v-model="liked"
                    @click="setLikeCookie()"
                  />
                  <label v-bind:for="product.id">
                    <i class="fas fa-heart"></i>
                  </label>
                </div>

                <div class="add-to-cart">
                  <button v-on:click="addToCart(product)">
                    <i class="fas fa-shopping-cart"></i>
                  </button>
                </div>
              </div>
            </div>

            <!-- no result message -->
            <div v-if="filteredList.length == []" class="no-result">
              <h3>Désolé</h3>
              <p>Aucun résultat trouvé</p>
            </div>
          </div>
          <!-- {{liked}} -->

          <!-- cart display -->
          <transition name="cart-anim">
            <div v-if="cart.length > 0" class="shopping-cart" id="shopping-cart">
              <h2>Panier</h2>

              <transition-group name="item-anim" tag="div" class="item-group">
                <div v-for="product, id in cart" class="item" v-bind:key="product.id">

                  <div class="img-container">
                    <img v-bind:src='product.img' />
                  </div>

                  <div class="item-description">
                    <h4>{{ product.description }}</h4>
                    <p>{{ product.price }}€</p>
                  </div>

                  <div class="item-quantity">
                    <h6>quantité : {{ product.quantity }}</h6>

                    <div class="cart-icons">
                      <button v-on:click="cartPlusOne(product)">
                        <i class="fa fa-plus"></i>
                      </button>
                      <button v-on:click="cartMinusOne(product, id)">
                        <i class="fa fa-minus"></i>
                      </button>
                      <button @click="cartRemoveItem(id)">
                        <i class="fa fa-trash"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </transition-group>

              <div class="grand-total">
                <div class="total">
                  <h2>Total</h2>
                  <h2>{{ cartTotalAmount }} €</h2>
                </div>
                <h6>Total articles : {{ itemTotalAmount }}</h6>
              </div>
              <div class="order-button">
                <button>Commander</button>
              </div>
            </div>
          </transition>
        </div>
      </div>
    </script>
 <?php 
 require_once "footer.php"
 ?>
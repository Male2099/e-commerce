<template>
  <div id="home">
    <div>
      <section class="section-Top">
        <div>
          <a href="#" class="phone"><img src="../assets/image/phone.svg" class="filter-white" style="height:50%">
            12345</a>
          <a href="#" class="location"><img src="../assets/image/location.svg" height="50%" class="filter-white"
              style="height:50%"> 123 street
            51</a>
        </div>
        <div>
          <a href="#" class="currentcy"><img src="../assets/image/dolla.svg" height="50%" class="filter-white"
              style="height: 50%;"> USD</a>
          <a href="#" class="register-login"><img src="../assets/image/profile.svg" height="50%" class="filter-white"
              style="height: 50%;"> Register</a>
        </div>
      </section>

      <header class="header-Navbar">
        <section>
          <div class="logo">
            logo
          </div>
          <div class="search">
            <input type="text" placeholder="search here">
            <button>seach</button>
          </div>
          <div class="cart">
            <a href="#">
              <div><img src="../assets/image/star.svg" class="filter-white" height="100%"></div>
              <div>whistlist</div>
            </a>
            <a href="#">
              <div><img src="../assets/image/cart.svg" class="filter-white" height="100%"></div>
              <div>cart</div>
            </a>
          </div>
        </section>
        <nav class="nav-bar">
          <a href="#">Home</a>
          <a href="#">Menu</a>
          <a href="#">Spacial</a>
          <a href="#">Discount</a>
          <a href="#">About us</a>
          <!-- <a href="#">Home</a> -->
        </nav>
      </header>
    </div>

    <main class="main">
      <section class="main-sec1">
        <div>
          <div class="desc">
            <strong>FOREST GLAM</strong>
            <p>Get your favorite breakfast combinations on a donut. Our Donut Breakfast Sandwich starts with a warm,
              delicious sliced donut</p>
          </div>
          <div class="discount">
            <button>SHOW NOW</button>
            <div>30% OFF</div>
          </div>
        </div>
        <div class="image-wrapper">
          <img src="../assets/random-image/I1.jpg">
        </div>
      </section>
      <section>

      </section>
    </main>

    <footer>

    </footer>
  </div>

  <!-- <RouterView /> -->
</template>
  <!-- . Make it your own with your choice of protein: egg, cheese, sausage or bacon, and don't
            forget to top it with maple drizzle and chopped bacon! -->


<style >









/* ssssss */
*{
  font-family: sans-serif;
}
.filter-white {
  filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(212deg) brightness(105%) contrast(103%);
  margin-left: 1rem;
}

body {
  padding: 0;
  margin: 0;
}

a {
  text-decoration: none;
}

a:active {
  color: inherit;
}


button:hover {
  cursor: pointer;
}

#home {
  height: 700px;
  width: 100%;
  margin: auto;
  background-color: rgb(255, 255, 255);
}

#home>:first-child {
  background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%);
  height: fit-content;
  box-shadow: 0 1.4px 14px #E297CE;
  margin-bottom: 1rem;
}

/* -------------------------- */
.section-Top {
  height: 30px;
  width: 100%;
  background: rgb(0, 0, 0);

  display: flex;
  justify-content: space-around;
  align-items: center;
}

.section-Top * {
  color: white;
  font-size: 0.7rem;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  padding: 0;
  margin: 0;
}

.section-Top>* {
  column-gap: 1rem;
}

.section-Top>*>* {
  padding: 0 5px 0 5px;
}

.section-Top>*>*:hover {
  border-radius: 5px;
  background-color: rgb(123, 123, 123);

}


/* ------------------------------- */
.header-Navbar {
  width: 100%;
  height: 120px;
  display: flex;
  flex-direction: column;

  /* background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%); */
  /* background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%); */
  /* background-image: linear-gradient(to right, #f83600 0%, #f9d423 100%); */
}

.header-Navbar>:first-child {
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: space-between;
}

.logo {
  height: 100%;
  width: 20%;
  display: flex;
  justify-content: center;
  align-items: center;

}

.search {
  height: 100%;
  width: 40%;
  display: flex;
  justify-content: center;
  align-items: center;
  column-gap: 0.7rem;
}

.search>input {
  height: 45%;
  min-width: 5rem;
  width: 75%;
  padding-left: 1rem;
  border-radius: 20px;

  border: 3px solid white;
  outline: none;
}

.search>input:focus {
  border: 3px solid #c928f2;

}

.search>input:focus::placeholder {
  color: transparent
}

.search>button {
  width: fit-content;
  padding: 0.8rem 1.2rem 0.8rem 1.2rem;
  border-radius: 20px;
  border: none;
  color: #ffffff;
  font-weight: bold;
  background-image: linear-gradient(to top, #4d86ea 0%, #04befe 100%);
}

.search>button:hover {
  background-image: linear-gradient(to top, #005eff 0%, #72d5f7 100%);
}

.search>button:active {
  background-image: linear-gradient(to top, #005bf9 0%, #00bfff 100%);
}

.cart {
  height: 100%;
  width: 10%;
  display: flex;
  justify-content: center;
  align-items: center;
  column-gap: 2rem;
  color: white;

}

.cart>* {
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.cart>*>:first-child {
  height: 50%;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.cart>*>* * {
  margin: 0;
  padding: 0;

}

/* --------------------------- */
.nav-bar {
  width: 100%;
  height: 70px;
  display: flex;
  align-items: center;
  justify-content: center;
  column-gap: 4rem;
}

.nav-bar>a {
  width: fit-content;
  height: 90%;
  color: white;

  font-weight: bold;

  padding-left: 1rem;
  padding-right: 1rem;

  border-left: 2.4px solid #005eff;
  border-right: 2.4px solid #005eff;
  border-radius: 5px;

  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 0;
}

.nav-bar>a:hover {
  background-image: linear-gradient(to top, #b66ae2 0%, #e868bd 100%);
}

 .main {
  height: 24rem;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.main-sec1 {
  height: 100%;
  width: 45rem;
  display: flex;
  justify-content: center;
  align-items: center;
}

.main-sec1>:first-child {
  height: 100%;
  width: 40%;

  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-direction: column;
}

.desc{
  height: 70%;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.desc strong{
  font-size: 2rem;
}

.desc p{
  padding-left:  1.5rem;
  padding-right:  1.5rem;
}

.discount {
  height: 30%;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  column-gap: 1rem;
}

.discount>*{
  height: 2.5rem;
  font-size: 1rem;
  color: white;
  font-weight: bold;
  width: fit-content;
  padding:0 1rem 0 1rem ;
  border-radius: 20px;
  border: none;
  background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%);

  display: flex;
  justify-content: center;
  align-items: center;
}

.discount button:hover{
  background-image: linear-gradient(120deg, #d57eeb  0%,#fccb90 100%);
}

.discount button:active{
  background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%);
}

.main-sec1>:last-child {
  height: 100%;
  width: 60%;
}

.image-wrapper {
  background-color: red;
  overflow: hidden;
  position: relative;
}

.image-wrapper img {
  height: 100%;
  position: absolute;
  right: -5rem;
}

</style>
  
<?php include 'header.php'; ?>

<style>

* {
  box-sizing: border-box;
}

.wrapper {
  margin: 5em auto;
  max-width: 1000px;

  background-color: #fff;
/*  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.06);*/
}

.header {
  padding: 30px 30px 0;
  text-align: center;

  &__title {
    margin: 0;
    text-transform: uppercase;
    font-size: 2.5em;
    font-weight: 500;
    line-height: 1.1;
  }
  &__subtitle {
    margin: 0;
    font-size: 1.5em;
    color: $gray;
    font-family: 'Yesteryear', cursive;
    font-weight: 500;
    line-height: 1.1;
  }
}

//Grid Container
.cards {
  padding: 15px;
  display: flex;
  flex-flow: row wrap;
}

//Cards
.card {
  margin: 15px; 
  width: calc((100% / 3) - 30px);
  transition: all 0.2s ease-in-out;

  //media queries for stacking cards
  @media screen and (max-width: 991px) {
    width: calc((100% / 2) - 30px);
  }

  @media screen and (max-width: 767px) {
    width: 100%;
  }

  &:hover {
    .card__inner {
      background-color: $turquoise;
      transform: scale(1.05);
    }
  }

  &__inner {
    width: 100%;
    padding: 30px;
    position: relative;
    cursor: pointer;
    
    background-color: $gray;
    color: $light-gray;
    font-size: 1.5em;
    text-transform: uppercase;
    text-align: center;

    transition: all 0.2s ease-in-out;
    
    &:after {
      transition: all 0.3s ease-in-out;
    }
    
    .fa {
      width: 100%;
      margin-top: .25em;
    }
  }

  //Expander
  &__expander {
    transition: all 0.2s ease-in-out;
    background-color: $slate;
    width: 100%;
    position: relative;
    
    display: flex;
    justify-content: center;
    align-items: center;
    
    text-transform: uppercase;
    color: $light-gray;
    font-size: 1.5em;
    
    .fa {
      font-size: 0.75em;
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
      
      &:hover {
        opacity: 0.9;
      }
    }
  }

  &.is-collapsed {
    
    .card__inner {
      &:after {
        content: "";
        opacity: 0;
      }
    }
    .card__expander {
      max-height: 0;
      min-height: 0;
      overflow: hidden;
      margin-top: 0;
      opacity: 0;
    }
  }

  &.is-expanded {

    .card__inner {
      background-color: $turquoise;
      
      &:after{
        content: "";
        opacity: 1;
        display: block;
        height: 0;
        width: 0;
        position: absolute;
        bottom: -30px;
        left: calc(50% - 15px);
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-bottom: 15px solid #333a45;
      }
      
      //folder open icon
      .fa:before {
        content: "\f115";
      }
    }

    .card__expander {
      max-height: 1000px;
      min-height: 200px;
      overflow: visible;
      margin-top: 30px;
      opacity: 1;
    }

    &:hover {
      .card__inner {
        transform: scale(1);
      }
    }
  }
  
  &.is-inactive {
    .card__inner {
      pointer-events: none;
      opacity: 0.5;
    }
    
    &:hover {
      .card__inner {
        background-color: $gray;
        transform: scale(1);
      }
    }
  }
}


//Expander Widths

//when 3 cards in a row
@media screen and (min-width: 992px) {

  .card:nth-of-type(3n+2) .card__expander {
    margin-left: calc(-100% - 30px);
  }
  .card:nth-of-type(3n+3) .card__expander {
    margin-left: calc(-200% - 60px);
  }
  .card:nth-of-type(3n+4) {
    clear: left;
  }
  .card__expander {
    width: calc(300% + 60px);
  }

}

//when 2 cards in a row
@media screen and (min-width: 768px) and (max-width: 991px) {

  .card:nth-of-type(2n+2) .card__expander {
    margin-left: calc(-100% - 30px);
  }
  .card:nth-of-type(2n+3) {
    clear: left;
  }
  .card__expander {
    width: calc(200% + 30px);
  }

}
.tiga {
   font-size: 25px;
   }
</style>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Petunjuk Pengunaan</a></li>
		</ul>
	</div>
</div>
<div class="wrapper">

  <div class="header">
    <h1 class="header__title">Petunjuk Penggunaan</h1>
    <h2 class="header__subtitle">Aplikasi Kelompok 5</h2>
  </div>
<div>
  <div>
    <p class="tiga">Ini adalah petunjuk penggunaan aplikasi Kel.5, Aplikasi ini bertujuan untuk menjual berbagai produk dari toko bungga Rose Nita.
        Aplikasi ini memerlukan login untuk melakukan transaksi jual beli pada aplikasi ini.<br><br>
        1. Lakukan login user <br>
        2. Melakukan pemilihan produk<br>
        3. Masukan keranjang untuk mennyimpan produk yang ingin dibeli<br>
        4. User bisa langsung membeli produk pada menu checkout<br>
        5. Kemudian ikuti intruksi yang dusah tersedia.<br><br>

        sekian
    
    </p>
</div>
</div>


  </div>

</div>


<?php include 'footer.php'; ?>
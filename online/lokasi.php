<?php include 'header.php'; ?>

<style>

* {
  box-sizing: border-box;
}

.wrapper {
  margin: 5em auto;
  max-width: 1000px;

  background-color: #fff;
  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.06);
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
			<li><a href="index.php">Lokasi</a></li>
		</ul>
	</div>
</div>
<div class="wrapper">

  <div class="header">
    <h1 class="header__title">Lokasi</h1>
    <h2 class="header__subtitle">Toko Bunga Rose Nita</h2>
<div>
  <div align="center">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d494.12737242997883!2d110.368632!3d-7.787812000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa0946553728e325d!2sToko%20Bunga%20Nanda!5e0!3m2!1sid!2sid!4v1670241987752!5m2!1sid!2sid" width="900" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>


  </div>

</div>
</div>


<?php include 'footer.php'; ?>
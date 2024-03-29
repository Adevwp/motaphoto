@charset "UTF-8";
/* The Modal (background) */
.contact-modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  /*background-color: rgb(0,0,0);  Fallback color */
  background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
  opacity: 0; /* Start with modal being transparent */
  animation: fadeIn 0.5s ease-out forwards; /* Apply the fade-in animation when shown */
}

@keyframes fadeIn {
  from {
    opacity: 0;
  } /* Start with an invisible state */
  to {
    opacity: 1;
  } /* End with a fully visible state */
}
/* Modal Content Block */
.contact-modal__content {
  background-color: #fefefe;
  margin: 15% auto; /*15% from the top and centered */
  padding-top: 4px;
  border: 3px solid #000;
  width: 597px;
  height: 825px;
}

/* The Close Button */
.contact-modal__content_close {
  color: #C4C4C4;
  float: right;
  font-size: 12px;
  font-weight: 600;
  padding-bottom: 2px;
}

.contact-modal__content_close:hover,
.contact-modal__content_close:focus {
  color: #313144;
  text-decoration: none;
  cursor: pointer;
}

/* Modal Body*/
.contact-modal__content_body {
  padding: 2px 26px;
  margin: auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  /*width: 100%;*/
  background-color: violet;
}
.contact-modal__content_body #wpcf7-f42-o1 {
  background-color: beige;
  margin-top: 10px;
}
.contact-modal__content_body input {
  height: 40px;
  width: 263px;
  border-radius: 8px;
  border: 1px solid #B8BBC2;
  /* margin-top: 0px;
   padding: 8px 15px;*/
  color: #000;
  font-family: "Poppins";
  font-size: 0.875rem;
  font-weight: 500;
}
.contact-modal__content_body input[type=submit] {
  height: 50px;
  border-radius: 2px;
  background-color: #D8D8D8;
  border-color: #D8D8D8;
  /*display: flex;
  justify-content: center;
  align-content: center;*/
  /* margin-top: -10px;
   margin-bottom: 0px;*/
  font-size: 14px;
  font-family: "Space Mono";
  font-weight: 400;
}
.contact-modal__content_body textarea {
  height: 210px;
  width: 263px;
  border-radius: 8px;
  border: 1px solid #B8BBC2;
}
.contact-modal__content_body label {
  color: #313144;
}

/*Contact form message */
.wpcf7 form .wpcf7-response-output {
  margin: -0.9em 0.5em 1em;
  padding-right: 0.5em;
  padding-left: 0.5em;
  font-size: 12px;
  font-family: "poppins";
  text-align: center;
  max-width: 275px;
}

.wpcf7 form.invalid .wpcf7-response-output {
  border: 2px solid #FE5858;
}

.wpcf7-spinner {
  display: none;
}

@font-face {
  font-family: "Poppins";
  src: url("../fonts/poppins/Poppins-Light.woff2") format("woff2"), url("../fonts/Poppins-LightNomDeLaPolice.woff") format("woff");
  font-weight: 300;
  font-style: normal;
}
@font-face {
  font-family: "Poppins";
  src: url("../fonts/poppins/Poppins-Light.woff2") format("woff2"), url("../fonts/Poppins-LightNomDeLaPolice.woff") format("woff");
  font-weight: 400;
  font-style: normal;
}
@font-face {
  font-family: "Space Mono";
  src: url("../fonts/space-mono/SpaceMono-Bold.woff2") format("woff2"), url("../fonts/space-mono/SpaceMono-Bold.woff") format("woff");
  font-weight: 700;
  font-style: normal;
}
@font-face {
  font-family: "Space Mono";
  src: url("../fonts/space-mono/SpaceMono-BoldItalic.woff2") format("woff2"), url("../fonts/space-mono/SpaceMono-BoldItalic.woff") format("woff");
  font-weight: 700;
  font-style: italic;
}
@font-face {
  font-family: "Space Mono";
  src: url("../fonts/space-mono/SpaceMono-Italic.woff2") format("woff2"), url("../fonts/space-mono/SpaceMono-Italic.woff") format("woff");
  font-weight: 400;
  font-style: italic;
}
@font-face {
  font-family: "Space Mono";
  src: url("../fonts/space-mono/SpaceMono-Regular.woff2") format("woff2"), url("../fonts/space-mono/SpaceMono-Regular.woff") format("woff");
  font-weight: 400;
  font-style: normal;
}
/* FOOTER STYLE*/
.site-footer {
  background-color: pink;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  border-top: 1px solid black;
  height: 60px;
}

.site-footer__menu {
  display: flex;
  flex-direction: row;
  padding: 0;
  gap: 86px;
}
.site-footer__menu ul {
  display: flex;
  justify-content: center;
  flex-direction: row;
  list-style: none;
  gap: 86px;
}
.site-footer__menu a {
  text-decoration: none;
  color: #000;
}

/* TODO 
Class non utilisée 
.site-footer__menu
.site-header__menu
*/
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
.hero-header {
  width: 100%;
  height: auto;
  max-height: 966px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  animation: fadeIn 200ms forwards;
  background-color: aquamarine;
}

.hero-header__title {
  width: 85%;
  position: absolute;
  left: 56%;
  bottom: 65%;
  transform: translate(-50%, 50%);
  z-index: 1;
}
.hero-header__title h1 {
  color: rgba(255, 255, 255, 0);
  -webkit-text-stroke: 3px white;
  opacity: 0;
  animation: fadeIn 200ms forwards;
}

.hero-header__image {
  position: relative;
  z-index: 0;
  max-width: 100%;
  /*position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%); /
  object-fit: contain;  TODO */
}
.hero-header__image .photo_hero {
  object-fit: cover;
}

/* ou ca comme para TODO pour image
    width: 100vw;
    height: 95vh;
    object-fit: cover;
*/
.site-main {
  max-width: 1440px;
}

.photos-list-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  align-items: center;
  width: 75vw;
  margin: 0 auto;
}

.image-catalogue {
  width: 564px;
  height: 495px;
  object-fit: cover;
  margin-top: 2%;
}

.overlay-catalogue {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 97%;
  margin-top: 2%;
  opacity: 0;
  background-color: rgba(0, 0, 0, 0.7);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transition: opacity 0.3s ease;
}

.photo-item:hover .overlay-catalogue {
  opacity: 1;
}

.loadmore-photo-button {
  display: flex;
  justify-content: center;
  background-color: green;
}

#loadmore-btn {
  width: 272px;
  height: 50px;
  padding: 8px 15px;
  margin: 50px 0;
  border: none;
  font-family: "Space Mono";
  font-size: 0.75rem;
  font-weight: 400;
  color: #000;
  background-color: #D8D8D8;
  border-radius: 2px;
  box-shadow: 0px 2px 1px 0px rgba(0, 0, 0, 0.02);
  transition: transform 0.35s ease, background-color 0.35s ease;
}
#loadmore-btn:hover {
  color: white;
  font-weight: 700;
  background-color: #000;
  transform: scale(1.1);
}

.site-header {
  background-color: greenyellow;
  display: flex;
  justify-content: space-between;
  align-items: center;
  /* width: 100vw;*/
  max-width: 1440px;
  /* margin: auto;
   padding-left: 146px;
   padding-right: 146px;*/
}
.site-header ul {
  display: flex;
  justify-content: center;
  flex-direction: row;
  list-style: none;
  gap: 45px;
}
.site-header a {
  text-decoration: none;
  color: #000;
}

/* TODO 
Class non utilisée 
.site-header__logo 

*/
.lightbox-popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.8);
  justify-content: center;
  align-items: center;
  flex-direction: column;
  z-index: 10;
}
.lightbox-popup button {
  opacity: 1;
  cursor: pointer;
  transition: opacity 0.3s;
  background: none;
  color: white;
  border: none;
}
.lightbox-popup button:hover {
  opacity: 0.5;
}
.lightbox-popup__close, .lightbox-popup__next, .lightbox-popup__prev {
  position: absolute;
  z-index: 12;
  cursor: pointer;
}
.lightbox-popup__close {
  top: 20px;
  right: 20px;
  border: none;
  width: 23px;
  height: 23px;
  padding: 0;
}
.lightbox-popup__next {
  right: 20px;
  top: 50%;
}
.lightbox-popup__prev {
  left: 20px;
  top: 50%;
}
.lightbox-popup__container {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 80vw;
  max-height: 80vh;
  margin: 0 50px;
  background-color: bisque;
  z-index: 11;
}
.lightbox-popup__container img {
  max-width: 90%;
  max-height: 90%;
}
.lightbox-popup__info {
  display: flex;
  justify-content: space-between;
  width: 80vw;
  padding: 5px 19px 5px 5px;
  color: white;
  font-family: "Space-Mono";
  font-size: 0.875rem;
  font-weight: 400;
  text-transform: uppercase;
}

/*** Media Queries ***/
/* Mobile Styles */
@media only screen and (max-width: 767px) {
  /* Ajoutez  styles mobiles ici */
  .lightbox-popup__container {
    width: 70vw;
  }
  .lightbox-popup__info {
    max-width: 30vw;
  }
}
/* Tablet Styles */
@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* Ajoutez styles tablette ici */
  .lightbox-popup__info {
    max-width: 55vw;
  }
}
.photo-block {
  position: relative;
  overflow: hidden;
  display: flex;
  height: 495px;
  width: 100%;
}
.photo-block__picture {
  width: 100%;
  height: 495px;
  object-fit: cover;
  transition: transform 0.3s ease;
}
.photo-block:hover .photo-block__picture {
  transform: scale(1.05);
}
.photo-block .photo-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
}
.photo-block .photo-overlay .photo-details {
  width: 46px;
  height: 30px;
}
.photo-block .photo-overlay .photo-fullscreen {
  position: absolute;
  top: 11px;
  right: 18px;
  width: 34px;
  height: 34px;
  cursor: pointer;
}
.photo-block .photo-overlay .photo-fullscreen:hover {
  opacity: 0.5;
}
.photo-block:hover .photo-overlay {
  opacity: 1;
  visibility: visible;
}
.photo-block .photo-overlay__info {
  position: absolute;
  bottom: 12px;
  left: 0;
  width: 100%;
  text-align: center;
  color: #FFF;
  font-family: "Poppins";
  font-size: 14px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  letter-spacing: 1.4px;
  text-transform: uppercase;
  opacity: 0;
  visibility: hidden;
}
.photo-block:hover .photo-overlay__info {
  opacity: 1;
  visibility: visible;
}
.photo-block .photo-overlay__reference,
.photo-block .photo-overlay__category {
  position: absolute;
}
.photo-block .photo-overlay__reference {
  bottom: 12px;
  left: 17px;
}
.photo-block .photo-overlay__category {
  bottom: 12px;
  right: 23px;
}

.single-photo {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100vw;
  max-width: 1440px;
  /*padding-left: 146px;
  padding-right: 146px;*/
}
.single-photo-info {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 80%;
  /*padding: 0 125px;*/
  background-color: pink;
  gap: 20px;
}
.single-photo-info_content {
  width: 50%;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  gap: 20px;
  margin-bottom: 20px;
}
.single-photo-info_content p {
  font-family: "Space Mono";
  text-transform: uppercase;
  margin: 0;
}
.single-photo-info_content h2 {
  line-height: 62px;
  margin: 0;
}
.single-photo-info__image {
  width: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.single-photo-info__image img {
  max-width: 100%;
  height: auto;
  object-fit: cover;
}
.single-photo-interaction {
  background-color: blue;
  width: 80%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  /*padding: 30px 125px; */
  height: 118px;
}
.single-photo-interaction__contact button {
  background-color: #D8D8D8;
  transition: transform 0.3s ease, background-color 0.3s ease;
}
.single-photo-interaction__contact button:hover {
  background-color: black;
  color: white;
  transform: scale(1.1);
}
.single-photo-interaction__navigation {
  display: flex;
  flex-direction: column;
  padding-right: 5px;
}
.single-photo-interaction__navigation .navigation-card-photo {
  display: flex;
}
.single-photo-interaction__navigation .navigation-card-photo a {
  text-decoration: none;
}
.single-photo-interaction__navigation .navigation-card-photo img {
  width: 81px;
  height: 71px;
}
.single-photo-interaction__navigation .navigation-card-photo .navigation-card-right {
  display: none;
}
.single-photo-interaction__navigation .navigation-card-photo .navigation-card-left {
  display: none;
}
.single-photo-interaction__navigation .navigation-card-arrow {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  gap: 10px;
  padding-top: 5px;
}
.single-photo-interaction__navigation .navigation-card-arrow img {
  transition: transform 0.3s ease;
}
.single-photo-interaction__navigation .navigation-card-arrow img:hover {
  transform: scale(1.2);
}
.single-photo .related-photos-section {
  display: flex;
  flex-direction: column;
  /*padding: 50px 140px;*/
  width: 80%;
  background-color: violet;
}
.single-photo .related-photos-section h3 {
  font-family: "Space_Mono", monospace;
  font-size: 18px;
  text-transform: uppercase;
}
.single-photo .related-photos-section .related-photos {
  display: flex;
  gap: 20px;
}

@media screen and (max-width: 600px) {
  .single-photo-info {
    padding: 0 25px;
  }
  .single-photo-info_content, .single-photo-info__image {
    width: 100%;
  }
  .single-photo-interaction {
    flex-direction: column;
    padding: 30px 25px;
  }
  .single-photo-interaction__contact, .single-photo-interaction__navigation {
    width: 100%;
  }
  .single-photo .related-photos-section {
    padding: 50px 25px;
  }
}
/*** BODY STYLE ***/
body {
  background-color: aqua;
  color: #000;
  max-width: 1440px !important;
  margin: auto;
}

/* Typography*/
h1, h2, h3, .site-footer, .site-header, .site-footer p {
  font-family: "Space Mono", monospace;
  text-transform: uppercase;
}

h1, h2 {
  font-style: italic;
}

h2, h3, .site-footer, .site-header, .site-footer p {
  font-weight: 400;
}

h3, p, .site-footer, .site-header, .site-footer p {
  font-style: normal;
}

h1 {
  font-size: 6rem;
  font-weight: 700;
}

h2 {
  font-size: 4.125rem;
}

h3 {
  font-size: 1.125rem;
}

p {
  font-family: "Poppins", sans-serif;
  font-size: 0.875rem;
  font-weight: 300;
}

.site-footer, .site-header, .site-footer p {
  font-size: 1rem;
}

/*** Media Queries ***/
/* Mobile Styles */
@media only screen and (max-width: 767px) {
  /* Ajoutez  styles mobiles ici */
  body {
    background-color: black; /*TODO à supp*/
    max-width: 767px;
  }
}
/* Tablet Styles */
@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* Ajoutez styles tablette ici */
  body {
    background-color: peachpuff; /*TODO à supp*/
    max-width: 991px;
  }
}
/* Desktop Styles */
@media only screen and (min-width: 992px) and (max-width: 1440px) {
  /* Ajoutez vos styles desktop ici */
}

/*# sourceMappingURL=style.cs.map */

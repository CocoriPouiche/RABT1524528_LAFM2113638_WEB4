gsap.registerPlugin(ScrollTrigger);

// Animation d'apparition de la section chef
gsap.from(".chef-section", {
  opacity: 0,
  y: 100,
  duration: 1.5,
  ease: "power3.out",
  scrollTrigger: {
    trigger: ".chef-section",
    start: "top 80%",
    toggleActions: "play none none none" 
  }
});

// Animation de la section Réservation avec ScrollTrigger
gsap.from(".section-reservation", {
  opacity: 0,
  y: 100, 
  duration: 1.5, 
  ease: "power3.out", 
  scrollTrigger: {
    trigger: ".section-reservation", 
    start: "top 80%", 
    end: "top 30%", 
    scrub: true, 
    toggleActions: "play none none none", 
    markers: false 
  }
});

// Animation spécifique pour l'image
gsap.from(".section-reservation .image", {
  opacity: 0, 
  x: -100, 
  duration: 1.5, 
  ease: "power3.out", 
  scrollTrigger: {
    trigger: ".section-reservation .image", 
    start: "top 80%", 
    end: "top 30%",
    scrub: true, 
    toggleActions: "play none none none"
  }
});

// Animation pour le texte
gsap.from(".section-reservation .text", {
  opacity: 0,
  y: 50, 
  duration: 1.5,
  ease: "power3.out",
  scrollTrigger: {
    trigger: ".section-reservation .text", 
    start: "top 80%", 
    end: "top 30%", 
    scrub: true,
    toggleActions: "play none none none"
  }
});

// Animation de la section Horaire
gsap.from(".grid-container.reverse", {
  opacity: 0, 
  y: 100, 
  duration: 1.5, 
  ease: "power3.out", 
  scrollTrigger: {
    trigger: ".grid-container.reverse", 
    start: "top 80%", 
    end: "top 30%", 
    scrub: true, 
    toggleActions: "play none none none", 
    markers: false 
  }
});

// Animation spécifique de l'image
gsap.from(".grid-container.reverse .image", {
  opacity: 0, 
  x: 100, 
  duration: 1.5, 
  ease: "power3.out", 
  scrollTrigger: {
    trigger: ".grid-container.reverse .image", 
    start: "top 80%", 
    end: "top 30%",
    scrub: true, 
    toggleActions: "play none none none"
  }
});

// Animation pour le texte
gsap.from(".grid-container.reverse .text", {
  opacity: 0,
  y: 50, 
  duration: 1.5,
  ease: "power3.out",
  scrollTrigger: {
    trigger: ".grid-container.reverse .text", 
    start: "top 80%", 
    end: "top 30%", 
    scrub: true,
    toggleActions: "play none none none"
  }
});

// Animation de pixi entre les section du main (Reservation et horaire)
const appTransition = new PIXI.Application({
    width: window.innerWidth,
    height: 200,
    transparent: true
  });
  document.querySelector(".pixi-transition").appendChild(appTransition.view);
  
  const bubbles = [];
  
  for (let i = 0; i < 10; i++) {
    const circle = new PIXI.Graphics();
    circle.beginFill(0xC3A93F, 0.2); 
    const size = Math.random() * 40 + 20;
    circle.drawCircle(0, 0, size);
    circle.endFill();
    circle.x = Math.random() * appTransition.screen.width;
    circle.y = Math.random() * appTransition.screen.height;
    appTransition.stage.addChild(circle);
    bubbles.push({ graphic: circle, speed: 0.1 + Math.random(), direction: Math.random() > 0.5 ? 1 : -1 });
  }
  
  appTransition.ticker.add(() => {
    for (const bubble of bubbles) {
      bubble.graphic.y += bubble.speed * bubble.direction;
      if (bubble.graphic.y > appTransition.screen.height || bubble.graphic.y < 0) {
        bubble.direction *= -1;
      }
    }
  });
  
  
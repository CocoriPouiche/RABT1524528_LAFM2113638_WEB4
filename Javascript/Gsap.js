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

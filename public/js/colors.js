  // Jeux de couleurs à sélectionner en Back Office lors de l'édition des Graphiques :

  // Jeu de couleurs n°1 (tons : rouge-violet..) :    
  const coloring_1 = ['#ef5350', '#ec407a', '#ab47bc', '#7e57c2', '#5c6bc0', '#42a5f5', '#8d6e63', '#26a69a', '#66bb6a', '#ffa726'];

  // Jeu de couleurs n°2 (tons : teal-violet-bleu-gris-marron-vert-orange-rose-noir) : 
  const coloring_2 = ['#26a69a', '#7e57c2', '#42a5f5', '#78909c', '#8d6e63', '#66bb6a', '#ff7043', '#ec407a', '#ef5350', '#000000'];

  // Jeu de couleurs n°3 (tons : bleu-bruns) : 
  const coloring_3 = ['#006064', '#4dd0e1', '#3949ab', '#7986cb', '#004d40', '#4db6ac', '#424242', '#78909c', '#4e342e', '#a1887f'];

  // Icônes personnalisés sur les graphs

  // Le Rouge :
  const icon_style_1 = 'url(http://localhost/projet5/public/backgrounds/icon-graph-1.png)';

  // Le Bleu :
  const icon_style_2 = 'url(http://localhost/projet5/public/backgrounds/icon-graph-2.png)';

  
  const icon_style_3 = 'url(http://localhost/projet5/public/backgrounds/icon-graph-3.png)';

  
  const icon_style_4 = 'url(http://localhost/projet5/public/backgrounds/icon-graph-4.png)';

  
  const icon_style_5 = 'url(http://localhost/projet5/public/backgrounds/icon-graph-5.png)';

  
  const icon_style_6 = 'url(http://localhost/projet5/public/backgrounds/icon-graph-6.png)';


  // 8 images linear-gradient en options pour le fond des graphs :   

  const background_style_1 = '/public/backgrounds/linearGradient-1.jpg';

  const background_style_2 = '/public/backgrounds/linearGradient-2.jpg';

  const background_style_3 = '/public/backgrounds/linearGradient-3.jpg';

  const background_style_4 = '/public/backgrounds/linearGradient-4.jpg';

  const background_style_5 = '/public/backgrounds/linearGradient-5.jpg';

  const background_style_6 = '/public/backgrounds/linearGradient-6.jpg';

  const background_style_7 = '/public/backgrounds/linearGradient-7.jpg';

  const background_style_8 = '/public/backgrounds/linearGradient-8.jpg';

  // Choix des fonds colorés des graphiques -> Fonctions injectées dans les graphiques
  function background_selection() {
      switch (true) {
          case design[1] === 'midnight-blue':
              var background_graph = background_style_1;
              return background_graph;
              break;
          case design[1] === 'light-grey':
              var background_graph = background_style_2;
              return background_graph;
              break;
          case design[1] === 'light-blue':
              var background_graph = background_style_3;
              return background_graph;
              break;
          case design[1] === 'red-orange':
              var background_graph = background_style_4;
              return background_graph;
              break;
          case design[1] === 'dark-green':
              var background_graph = background_style_5;
              return background_graph;
              break;
          case design[1] === 'light-yellow':
              var background_graph = background_style_6;
              return background_graph;
              break;
          case design[1] === 'light-red':
              var background_graph = background_style_7;
              return background_graph;
              break;
          case design[1] === 'light-green':
              var background_graph = background_style_8;
              return background_graph;
              break;
          default:
              break;
      };
  };

  function icon_selection() {
      // Sélection des icônes personnalisés (6 options)
      if (design[2] === 'red-icon') {
          var icon_graph = icon_style_1;
          return icon_graph;
      };
      if (design[2] === 'blue-icon') {
          var icon_graph = icon_style_2;
          return icon_graph;
      };
      if (design[2] === 'green-icon') {
          var icon_graph = icon_style_3;
          return icon_graph;
      };
      if (design[2] === 'purple-icon') {
          var icon_graph = icon_style_4;
          return icon_graph;
      };
      if (design[2] === 'orange-icon') {
          var icon_graph = icon_style_5;
          return icon_graph;
      };
      if (design[2] === 'yellow-icon') {
          var icon_graph = icon_style_6;
          return icon_graph;
      };
  }

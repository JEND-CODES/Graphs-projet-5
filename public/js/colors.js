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


  // 5 images linear-gradient en options pour le fond des graphs :   

  const background_style_1 = '/public/backgrounds/linearGradient-1.jpg';

  const background_style_2 = '/public/backgrounds/linearGradient-2.jpg';

  const background_style_3 = '/public/backgrounds/linearGradient-3.jpg';

  const background_style_4 = '/public/backgrounds/linearGradient-4.jpg';

  const background_style_5 = '/public/backgrounds/linearGradient-5.jpg';

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
          default:
              break;
      };
  };

  function background_selection_v2() {
      switch (true) {
          case design_v2[1] === 'midnight-blue':
              var background_graph_v2 = background_style_1;
              return background_graph_v2;
              break;
          case design_v2[1] === 'light-grey':
              var background_graph_v2 = background_style_2;
              return background_graph_v2;
              break;
          case design_v2[1] === 'light-blue':
              var background_graph_v2 = background_style_3;
              return background_graph_v2;
              break;
          case design_v2[1] === 'red-orange':
              var background_graph_v2 = background_style_4;
              return background_graph_v2;
              break;
          case design_v2[1] === 'dark-green':
              var background_graph_v2 = background_style_5;
              return background_graph_v2;
              break;
          default:
              break;
      };
  };

  function background_selection_v3() {
      switch (true) {
          case design_v3[1] === 'midnight-blue':
              var background_graph_v3 = background_style_1;
              return background_graph_v3;
              break;
          case design_v3[1] === 'light-grey':
              var background_graph_v3 = background_style_2;
              return background_graph_v3;
              break;
          case design_v3[1] === 'light-blue':
              var background_graph_v3 = background_style_3;
              return background_graph_v3;
              break;
          case design_v3[1] === 'red-orange':
              var background_graph_v3 = background_style_4;
              return background_graph_v3;
              break;
          case design_v3[1] === 'dark-green':
              var background_graph_v3 = background_style_5;
              return background_graph_v3;
              break;
          default:
              break;
      };
  };

  function background_selection_v4() {
      switch (true) {
          case design_v4[1] === 'midnight-blue':
              var background_graph_v4 = background_style_1;
              return background_graph_v4;
              break;
          case design_v4[1] === 'light-grey':
              var background_graph_v4 = background_style_2;
              return background_graph_v4;
              break;
          case design_v4[1] === 'light-blue':
              var background_graph_v4 = background_style_3;
              return background_graph_v4;
              break;
          case design_v4[1] === 'red-orange':
              var background_graph_v4 = background_style_4;
              return background_graph_v4;
              break;
          case design_v4[1] === 'dark-green':
              var background_graph_v4 = background_style_5;
              return background_graph_v4;
              break;
          default:
              break;
      };
  };

  function background_selection_v5() {
      switch (true) {
          case design_v5[1] === 'midnight-blue':
              var background_graph_v5 = background_style_1;
              return background_graph_v5;
              break;
          case design_v5[1] === 'light-grey':
              var background_graph_v5 = background_style_2;
              return background_graph_v5;
              break;
          case design_v5[1] === 'light-blue':
              var background_graph_v5 = background_style_3;
              return background_graph_v5;
              break;
          case design_v5[1] === 'red-orange':
              var background_graph_v5 = background_style_4;
              return background_graph_v5;
              break;
          case design_v5[1] === 'dark-green':
              var background_graph_v5 = background_style_5;
              return background_graph_v5;
              break;
          default:
              break;
      };
  };

  function background_selection_v11() {
      switch (true) {
          case design_v11[1] === 'midnight-blue':
              var background_graph_v11 = background_style_1;
              return background_graph_v11;
              break;
          case design_v11[1] === 'light-grey':
              var background_graph_v11 = background_style_2;
              return background_graph_v11;
              break;
          case design_v11[1] === 'light-blue':
              var background_graph_v11 = background_style_3;
              return background_graph_v11;
              break;
          case design_v11[1] === 'red-orange':
              var background_graph_v11 = background_style_4;
              return background_graph_v11;
              break;
          case design_v11[1] === 'dark-green':
              var background_graph_v11 = background_style_5;
              return background_graph_v11;
              break;
          default:
              break;
      };
  };

  function background_selection_v12() {
      switch (true) {
          case design_v12[1] === 'midnight-blue':
              var background_graph_v12 = background_style_1;
              return background_graph_v12;
              break;
          case design_v12[1] === 'light-grey':
              var background_graph_v12 = background_style_2;
              return background_graph_v12;
              break;
          case design_v12[1] === 'light-blue':
              var background_graph_v12 = background_style_3;
              return background_graph_v12;
              break;
          case design_v12[1] === 'red-orange':
              var background_graph_v12 = background_style_4;
              return background_graph_v12;
              break;
          case design_v12[1] === 'dark-green':
              var background_graph_v12 = background_style_5;
              return background_graph_v12;
              break;
          default:
              break;
      };
  };

  function background_selection_v13() {
      switch (true) {
          case design_v13[1] === 'midnight-blue':
              var background_graph_v13 = background_style_1;
              return background_graph_v13;
              break;
          case design_v13[1] === 'light-grey':
              var background_graph_v13 = background_style_2;
              return background_graph_v13;
              break;
          case design_v13[1] === 'light-blue':
              var background_graph_v13 = background_style_3;
              return background_graph_v13;
              break;
          case design_v13[1] === 'red-orange':
              var background_graph_v13 = background_style_4;
              return background_graph_v13;
              break;
          case design_v13[1] === 'dark-green':
              var background_graph_v13 = background_style_5;
              return background_graph_v13;
              break;
          default:
              break;
      };
  };

  function background_selection_v14() {
      switch (true) {
          case design_v14[1] === 'midnight-blue':
              var background_graph_v14 = background_style_1;
              return background_graph_v14;
              break;
          case design_v14[1] === 'light-grey':
              var background_graph_v14 = background_style_2;
              return background_graph_v14;
              break;
          case design_v14[1] === 'light-blue':
              var background_graph_v14 = background_style_3;
              return background_graph_v14;
              break;
          case design_v14[1] === 'red-orange':
              var background_graph_v14 = background_style_4;
              return background_graph_v14;
              break;
          case design_v14[1] === 'dark-green':
              var background_graph_v14 = background_style_5;
              return background_graph_v14;
              break;
          default:
              break;
      };
  };

  function background_selection_v15() {
      switch (true) {
          case design_v15[1] === 'midnight-blue':
              var background_graph_v15 = background_style_1;
              return background_graph_v15;
              break;
          case design_v15[1] === 'light-grey':
              var background_graph_v15 = background_style_2;
              return background_graph_v15;
              break;
          case design_v15[1] === 'light-blue':
              var background_graph_v15 = background_style_3;
              return background_graph_v15;
              break;
          case design_v15[1] === 'red-orange':
              var background_graph_v15 = background_style_4;
              return background_graph_v15;
              break;
          case design_v15[1] === 'dark-green':
              var background_graph_v15 = background_style_5;
              return background_graph_v15;
              break;
          default:
              break;
      };
  };

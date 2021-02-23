jQuery(document).ready(function($){
  
    var lastId;
    var navbar = $("#top-menu");
    var adjustValue = 100; 
    var navbarHeight = navbar.outerHeight() +  adjustValue;
    var navbarItems = navbar.find("a");  // Pega todos as tags <a> dentro do <ul> da navbar
  
    var itemIdIndex = window.location.href.indexOf('#');
  
    if(itemIdIndex !== -1)
      var path = window.location.href.slice(0, itemIdIndex);
    else
      var path = window.location.href;
    
    var scrollItems = getAllScrollableHTMLElements(navbarItems, path);
    
    // Pego a distancia da navbar para o topo da página
    var fromTop = $(this).scrollTop()+navbarHeight;
    
    makeNavbarSmoothLinking(navbarItems, navbarHeight, adjustValue, path);
  
  
  if(screen.width > 998 ){
    // Acho o link da navbar que correponde ao link da página atual e deixa marcado
    // como item ativo inícial
    $(`a[href="${window.location.href}"]`).addClass('active');
    

    $(window).scroll(function(){
      
      let ready = getItensThatPassedTheNavbar(scrollItems, fromTop);
  
      
      let id = getCurrentSectionId(ready);
  
      if (lastId !== id && ready) {
  
        lastId = id;
        
        updateNavbarActiveLink(navbarItems, id, path);      
      }
    });
  
  }
    
    /**
    * Percorre os links da navbar para ver se algum se refere a algum elemento HTML
    * presente na página, caso faça, é configurado um smooth scrool quando
    * o link for clicado
    * 
    * @param {Object} navbarItems 
    * @param {Float} navbarHeight 
    * @param {Interger} adjustValue 
    */
    
    function makeNavbarSmoothLinking(navbarItems, navbarHeight, adjustValue = 100, path){
      navbarItems.click(function(e){
        var href = $(this).attr("href");
        if(href[0] === "#" || href[path.length] === "#"){
          const itemPath = href.slice(path.length, href.length);
          var offsetTop = $(itemPath).offset().top  - navbarHeight + adjustValue;
          $('html, body').stop().animate({ 
            scrollTop: offsetTop
          }, 300);
          e.preventDefault();
        }
      });
    }
    
    
    /**
    * Percorre por todos as tags <a> que estão presentes no navbarItems e checa se
    * alguma delas corresponde a algum ID presente em algum elemento no documento
    * HTML. Se correponder esse elemento é adicionado as array scrollItems.
    * 
    * @param {Object} navbarItems 
    * @param {Integer} pathInitialIndex 
    */
    function getAllScrollableHTMLElements(navbarItems,path){
      let pathInitialIndex = path.length;
      let scrollItems =  navbarItems.map(function(){
        
        const linkPath = $(this).attr("href");
        if(linkPath[0] === "#"){
  
          const item = $(`${linkPath}`);
          if (item.length) return item; 
          
        }else if(linkPath[pathInitialIndex] === "#"){
  
          const itemPath = linkPath.slice(pathInitialIndex, linkPath.length);
          const item = $(`${itemPath}`);
          if (item.length) return item;
        }else{
          const itemPath = linkPath.slice(pathInitialIndex, linkPath.length-1);
          const itemID = `#${itemPath.length  ? itemPath : "home"}`;  
          const item = $(`${itemID}`);
          if (item.length) return item; 
        }
        
      });
      
      return scrollItems;
    }
    
    
    /**
    * Pega o ID do ultimo elemento que foi considerado como pronto para estar
    * ativo, afinal se ele é o útimo é na seção dele que estamos
    * 
    * @param {Object} readyItems 
    */
    
    function getCurrentSectionId(readyItems){
      readyItems = readyItems[readyItems.length-1];
      const id = readyItems && readyItems.length ? readyItems[0].id : "";
      
      return id
    }
    
    /**
    * Percorre todos os itens do scrollItems e guarda aqueles que já estão em 
    * posição de serem marcados como ativos
    * 
    * @param {Object} scrollItems 
    */
    
    function getItensThatPassedTheNavbar(scrollItems, navbarDistanceFromTop){
      let ready = scrollItems.map(function(){
        const offsetTop = $(this).offset().top - $(window).scrollTop();
        if (offsetTop < navbarDistanceFromTop){
          return this;
        }
      });
      
      return ready;
    }
    
    /**
    * Checa se o ultimo elemento não é igual ao elemento atual
    * e faz a troca da classe active para o elemento atual
    * 
    * @param {Object} navbarItems 
    */
    function updateNavbarActiveLink(navbarItems, currentSection,path){
      navbarItems.removeClass("active");
      if(currentSection === "home")
        $(`a[href="${path}"]`).addClass("active");
      else if($(`a[href="#${currentSection}"]`).length)
        $(`a[href="#${currentSection}"]`).addClass("active");
      else if($(`a[href="${path}#${currentSection}"]`).length)
        $(`a[href="${path}#${currentSection}"]`).addClass("active");
      else
        $(`a[href$="${currentSection}/"]`).addClass("active");
    }
  });
  
const getBasePath = () => {
  const path = window.location.pathname;
  // Match everything up to /src (inclusive)
  const srcMatch = path.match(/(.*\/src)\//);
  return srcMatch ? srcMatch[1] : '';
};

const BASE_PATH = getBasePath();

const LINKS_GROUPS = [
  [{ 
    name: "Home", 
    url: BASE_PATH + "/index.php",
    icon: "bi-house"
  }],
  [
    {
      name: "Ajouter Enseignant",
      url: BASE_PATH + "/enseignant/ajouter_enseignant.php",
      icon: "bi-person-plus"
    }
  ],
  [
    { 
      name: "Etudiants",
      url: BASE_PATH + "/etudiant/liste_etudiants.php", // Fixed: liste_etudiants.php (plural)
      icon: "bi-people"
    },
    { 
      name: "Ajouter Etudiant",
      url: BASE_PATH + "/etudiant/ajouter_etudiant.php",
      icon: "bi-person-add"
    }
  ],
  [
    { 
      name: "Soutenance", 
      url: BASE_PATH + "/soutenance/rechercher.php",
      icon: "bi-search"
    },
    {
      name: "Ajouter Soutenance",
      url: BASE_PATH + "/soutenance/ajouter_soutenance.php",
      icon: "bi-calendar-plus"
    }
  ]
];

// Create navigation bar
const createNavbar = () => {
    const navbar = document.createElement("nav");
    const linksContainer = document.createElement("div");
    linksContainer.className = "links-container";

    // Create navigation groups
    LINKS_GROUPS.forEach((linkGroup, groupIndex) => {
        const groupContainer = document.createElement("ul");
        groupContainer.className = `nav-group nav-group-${groupIndex + 1}`;

        linkGroup.forEach(link => {
            const linkContainer = document.createElement("li");
            const linkElement = document.createElement("a");
            
            // Use the URL directly from LINKS_GROUPS
            linkElement.href = link.url;
            linkElement.innerHTML = `
                <i class="bi ${link.icon}"></i>
                <span>${link.name}</span>
            `;
            
            linkContainer.appendChild(linkElement);
            groupContainer.appendChild(linkContainer);
        });

        linksContainer.appendChild(groupContainer);
    });

    navbar.appendChild(linksContainer);
    return navbar;
};

// Debug: Check what BASE_PATH resolves to
console.log("BASE_PATH:", BASE_PATH);
console.log("Full URL for enseignants:", BASE_PATH + "/enseignant/ajouter_enseignant.php");

// Initialize when page loads
window.addEventListener('DOMContentLoaded', function () {
    // Don't show navbar on login page
    if (window.location.pathname.includes('login.php')) {
        return;
    }
    
    const navbar = createNavbar();
    document.body.insertBefore(navbar, document.body.firstChild);
});
const sidebarLinks = document.querySelectorAll("#list-menu a");
const windowPathName = window.location.pathname;
const dashboardMenu = document.querySelector(".dashboard");

sidebarLinks.forEach((link) => {
	const linkPathname = new URL(link.href).pathname;

	if (windowPathName === linkPathname) {
		if (link.classList.contains("text-gray-500")) {
			link.classList.remove("text-gray-500");
			link.classList.add("text-amber-400");
		}

		dashboardMenu.classList.remove("text-amber-400");
		dashboardMenu.classList.add("text-gray-500");
	}

});

<style>
.sidebar {
    /* Light background for the sidebar */
    color: #333333;
    /* Dark text color */
    flex-shrink: 0;
    padding: 15px;
    border-right: 1px solid #dee2e6;
    position: fixed;
    /* Light border color */
}

.sidebar a {
    color: #333333;
    /* Dark text color */
    text-decoration: none;
}

.sidebar .nav-link:hover {
    background-color: #e0e0e0;
    /* border-radius: 10px 0 0 10px; */
    /* Light hover background color */
}

.nav-link.active {
    background-color: #e0e0e0;
    /* border-radius: 10px 0 0 10px; */
    /* Light hover background color */
}

.main-content {
    flex-grow: 1;
    padding: 20px;
    background-color: #ffffff;
    /* Light background for the main content */
}

.arrow {
    /* transition: transform 0.3s; */
    transition: none;
}

.arrow.rotated {
    transform: rotate(90deg);
}

@media (max-width: 767.98px) {
    .sidebar {
        position: static;
        top: 11.5rem;
        padding: 0;
    }
}

@media (min-width: 767.98px) {
    .navbar {
        top: 0;
        position: sticky;
        z-index: 999;
    }
}
</style>
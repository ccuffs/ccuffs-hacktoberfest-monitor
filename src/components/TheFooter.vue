<template>
    <footer>
        <div class="p-4">
            Build with 
            <svg class="footer__heart" viewBox="0 0 32 29.6">
                <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2
                c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
            </svg> 
            by 
            <a href="https://uffs.cc" target="_blank"
                rel="noopener noreferrer" class="footer__link orange"
            >
                CCUFFS.
            </a>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'TheFooter'
}
</script>

<style>
    footer {
        font-size: 1.3rem;
    }

    .footer__heart {
        fill: red;
        width: 1rem;
        animation: pulse 1.3s ease infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }
</style>
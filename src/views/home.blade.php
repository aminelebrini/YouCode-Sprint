<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?php echo $titre; ?></title>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes borderGlow {
            0%, 100% { border-color: rgba(34, 211, 238, 0.3); shadow: 0 0 10px rgba(34, 211, 238, 0.1); }
            50% { border-color: rgba(34, 211, 238, 0.6); shadow: 0 0 20px rgba(34, 211, 238, 0.3); }
        }

        .animate-fade-in {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .glow-pulse {
            animation: borderGlow 3s infinite ease-in-out;
        }
    </style>
</head>
<body class="bg-[url('https://42.fr/wp-content/uploads/2021/07/Background-RM-2000x1132.jpg')] bg-cover bg-center bg-no-repeat min-h-screen flex items-center justify-center p-4">

    <div class="animate-fade-in glow-pulse bg-black/70 backdrop-blur-xl p-8 md:p-10 rounded-3xl border border-cyan-400/50 shadow-[0_0_30px_rgba(0,0,0,0.5)] w-full max-w-md">
        
        <header class="text-center mb-8">
            <img src="../assets/logoysprint.png" width="100px" height="100px" alt="">
            <div class="h-1 w-12 bg-cyan-500 mx-auto rounded-full mb-4"></div>
            <p class="text-cyan-100/60 text-sm italic font-medium">Ready to code? Accelerate your future.</p>
        </header>

        <form action="/login" method="POST" class="space-y-5">
            <div class="group">
                <label class="text-cyan-400 text-[10px] uppercase font-bold mb-1 block ml-1 tracking-widest opacity-70 group-focus-within:opacity-100 transition-opacity">Identifiant</label>
                <input type="text" name="username" required
                    class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white placeholder-white/20 focus:border-cyan-400 focus:bg-white/10 focus:ring-1 focus:ring-cyan-400 outline-none transition-all duration-300"
                    placeholder="votre.nom@youcode.ma">
            </div>

            <div class="group">
                <label class="text-cyan-400 text-[10px] uppercase font-bold mb-1 block ml-1 tracking-widest opacity-70 group-focus-within:opacity-100 transition-opacity">Mot de passe</label>
                <input type="password" name="password" required
                    class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-white placeholder-white/20 focus:border-cyan-400 focus:bg-white/10 focus:ring-1 focus:ring-cyan-400 outline-none transition-all duration-300"
                    placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between text-[11px] text-cyan-100/40 px-1">
                <label class="flex items-center cursor-pointer hover:text-cyan-400 transition-colors group">
                    <input type="checkbox" class="mr-2 accent-cyan-500 rounded border-none"> 
                    <span>Se souvenir de moi</span>
                </label>
                <a href="#" class="hover:text-cyan-400 transition-colors underline decoration-cyan-500/30 underline-offset-4">Mot de passe oublié ?</a>
            </div>

            <button type="submit" 
                class="relative overflow-hidden w-full bg-cyan-500 hover:bg-cyan-400 text-black font-black py-4 rounded-xl transition-all duration-300 transform hover:scale-[1.03] active:scale-95 uppercase tracking-[0.2em] shadow-lg shadow-cyan-500/20 group">
                <span class="relative z-10">Démarrer le Sprint</span>
                <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
            </button>
        </form>

        <footer class="mt-10 text-center border-t border-white/5 pt-6">
            <p class="text-white/30 text-[11px] uppercase tracking-widest">
                Pas encore de compte ? 
                <a href="#" class="text-cyan-400 font-bold hover:text-white transition-colors ml-1">Inscris-toi</a>
            </p>
        </footer>
    </div>

</body>
</html>
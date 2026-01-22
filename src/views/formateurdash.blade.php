<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>{{ $title }} | YouCode Sprint</title>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeInUp 0.6s ease-out forwards; }
        
        .glass-card {
            background: rgba(5, 5, 5, 0.8);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(34, 211, 238, 0.2);
        }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #050505; }
        ::-webkit-scrollbar-thumb { background: #22d3ee; border-radius: 10px; }
    </style>
</head>
<body class="bg-cyan-900 bg-cover bg-center bg-no-repeat min-h-screen font-sans text-white overflow-hidden">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-72 glass-card m-4 rounded-[2rem] hidden md:flex flex-col p-6 animate-fade-in">
            <header class="text-center mb-12">
                <h1 class="text-white text-2xl font-black italic uppercase tracking-tighter">
                    Formateur <br>
                    <span class="text-cyan-400 inline-block">Dashboard</span>
                </h1>
                <div class="h-[2px] w-[40%] bg-cyan-500 mx-auto mt-2 rounded-full shadow-[0_0_10px_#22d3ee]"></div>
            </header>

            <nav class="flex-1 space-y-3">
                <a href="#" class="flex items-center space-x-4 text-cyan-400 bg-white/5 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                    <i class="fas fa-th-large"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="#" class="flex items-center space-x-4 text-cyan-400 bg-white/5 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                    <i class="fas fa-file-code group-hover:rotate-12 transition-transform"></i>
                    <span>Mes Briefs</span>
                </a>
                <a href="#" class="flex items-center space-x-4 text-cyan-400 bg-white/5 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                    <i class="fas fa-user-graduate"></i>
                    <span>Mes Apprenants</span>
                </a>
                <a href="#" class="flex items-center space-x-4 text-cyan-400 bg-white/5 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                    <i class="fas fa-tasks"></i>
                    <span>Évaluations</span>
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-white/5">
                <form action="/logout" method="POST">
                    <button class="w-full flex items-center space-x-4 text-red-400/60 hover:text-red-400 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                        <i class="fas fa-power-off"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-4 md:p-8 overflow-y-auto">
            
            <div class="glass-card rounded-[1.5rem] p-4 mb-8 flex justify-between items-center px-8 animate-fade-in">
                <div class="flex flex-col">
                    <span class="text-[10px] text-cyan-400 font-black uppercase tracking-[0.3em]">Session Active</span>
                    @foreach($classes as $classe)
                    @if($classe->getFormateurId() === $_SESSION['id'])
                    <h2 class="text-white font-black uppercase tracking-widest text-sm italic">{{ $classe->getNom() }}</h2>
                    @endif
                    @endforeach
                </div>
                <div class="flex items-center space-x-4 border-l border-white/10 pl-6">
                    <div class="text-right">
                        <p class="text-[10px] text-white/40 uppercase font-bold tracking-widest">Formateur</p>
                        @foreach($users as $user)
                        @if($user->getId() === $_SESSION['id'])
                            <p class="text-xs font-black text-white uppercase italic">{{ $user->getFirstname() . " " . $user->getLastname() }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-400 to-blue-600 p-0.5 shadow-[0_0_15px_rgba(34,211,238,0.3)]">
                        <img src="https://ui-avatars.com/api/?name={{ $user->getFirstname() . ' ' . $user->getLastname() }}&background=000&color=fff" class="rounded-lg" alt="avatar">
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate-fade-in">
                <div class="glass-card p-6 rounded-[2rem] border-l-4 border-l-cyan-400">
                    <p class="text-white/40 text-[9px] uppercase font-black tracking-widest mb-1">Briefs Lancés</p>
                    <h3 class="text-2xl font-black italic">12</h3>
                </div>
                <div class="glass-card p-6 rounded-[2rem] border-l-4 border-l-purple-500">
                    <p class="text-white/40 text-[9px] uppercase font-black tracking-widest mb-1">Apprenants</p>
                    <h3 class="text-2xl font-black italic">24</h3>
                </div>
                <div class="glass-card p-6 rounded-[2rem] border-l-4 border-l-yellow-500">
                    <p class="text-white/40 text-[9px] uppercase font-black tracking-widest mb-1">Rendus en attente</p>
                    <h3 class="text-2xl font-black italic">08</h3>
                </div>
                <div class="glass-card p-6 rounded-[2rem] border-l-4 border-l-green-500">
                    <p class="text-white/40 text-[9px] uppercase font-black tracking-widest mb-1">Briefs Validés</p>
                    <h3 class="text-2xl font-black italic">85%</h3>
                </div>
            </div>

            <section class="mb-8 animate-fade-in" style="animation-delay: 0.2s;">
                <div class="flex justify-between items-center mb-6 px-4">
                    <h2 class="text-cyan-400 font-black uppercase tracking-[0.3em] text-lg italic"><i class="fas fa-file-invoice mr-3"></i>Briefs Récents</h2>
                    <button onclick="toggleModal('BriefModal')" class="bg-white text-black font-black px-6 py-3 rounded-xl hover:bg-cyan-400 transition-all uppercase tracking-widest text-[9px] flex items-center gap-2 shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                        <i class="fas fa-paper-plane"></i> Nouveau Brief
                    </button>
                </div>
                <!--exemple-->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="glass-card p-8 rounded-[2.5rem] group hover:border-cyan-400/50 transition-all duration-500 relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-6">
                            <span class="px-3 py-1 bg-green-500/10 text-green-400 rounded-full text-[8px] font-black uppercase tracking-widest border border-green-500/20">Actif</span>
                        </div>
                        <h4 class="text-xl font-black text-white uppercase mb-2 group-hover:text-cyan-400 transition-colors italic">Système de Gestion de Stock</h4>
                        <p class="text-white/40 text-xs mb-6 leading-relaxed line-clamp-2 uppercase tracking-tighter">Développer une application CRUD avec PHP Orienté Objet et PostgreSQL...</p> 
                    </div>
                    <div class="flex items-center justify-between pt-6 border-t border-white/5">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full border-2 border-zinc-900 bg-cyan-400 text-black flex items-center justify-center text-[8px] font-black">JS</div>
                            <div class="w-8 h-8 rounded-full border-2 border-zinc-900 bg-purple-500 text-white flex items-center justify-center text-[8px] font-black">PHP</div>
                            <div class="w-8 h-8 rounded-full border-2 border-zinc-900 bg-zinc-800 text-white/40 flex items-center justify-center text-[8px] font-black">+3</div>
                        </div>
                        <button class="text-[10px] font-black text-cyan-400 uppercase tracking-widest hover:underline decoration-2 underline-offset-8">Gérer les rendus</button>
                    </div>
                </div>
            </section>

        </main>
    </div>

    <div id="BriefModal" class="hidden fixed inset-0 bg-black/90 backdrop-blur-md z-50 flex items-center justify-center p-4">
        <div class="glass-card w-full max-w-2xl p-10 rounded-[2.5rem] border border-cyan-400/30 animate-fade-in shadow-[0_0_50px_rgba(34,211,238,0.1)] max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-white text-2xl font-black italic uppercase tracking-tighter">Lancer <span class="text-cyan-400">Nouveau Brief</span></h3>
                <button onclick="toggleModal('BriefModal')" class="text-white/20 hover:text-white transition-all"><i class="fas fa-times text-xl"></i></button>
            </div>
            
            <form class="space-y-6 text-left">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2 italic">Titre du Projet</label>
                        <input type="text" name="titre" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2 italic">Date Debut</label>
                        <input type="date" name="date_debut" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2 italic">Date Fin</label>
                        <input type="date" name="date_fin" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2 italic">Le Sprint</label>
                    <select name="sprint_id" required
                        class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 pl-12 pr-5 text-white outline-none focus:border-cyan-400/50 appearance-none cursor-pointer">
                        <option value="" class="bg-zinc-900">Choisir une le Sprint...</option>
                        @foreach($sprints as $sprint)
                            <option value="{{ $sprint->getId() }}" class="bg-zinc-900">
                                {{ $sprint->getTitre() }}
                            </option>
                        @endforeach
                    </select>
                </div>

               <div class="space-y-2">
                    <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2 italic">
                     Le Type
                    </label>

                    <div class="grid grid-cols-2 gap-3">
                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                         <input type="checkbox" name="type[]" value="HTML/CSS" class="accent-cyan-400">
                            <span class="text-white text-sm">HTML / CSS</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                         <input type="checkbox" name="type[]" value="Figma" class="accent-cyan-400">
                            <span class="text-white text-sm">Figma</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                         <input type="checkbox" name="type[]" value="JavaScript" class="accent-cyan-400">
                            <span class="text-white text-sm">JavaScript</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                         <input type="checkbox" name="type[]" value="PHP" class="accent-cyan-400">
                         <span class="text-white text-sm">PHP</span>
                        </label>

                     <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                         <input type="checkbox" name="type[]" value="MySQL" class="accent-cyan-400">
                            <span class="text-white text-sm">MySQL</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                         <input type="checkbox" name="type[]" value="PostgreSQL" class="accent-cyan-400">
                            <span class="text-white text-sm">Postgre SQL</span>
                     </label>

                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                         <input type="checkbox" name="type[]" value="Docker" class="accent-cyan-400">
                            <span class="text-white text-sm">Docker</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                         <input type="checkbox" name="type[]" value="Bootstrap" class="accent-cyan-400">
                         <span class="text-white text-sm">Bootstrap</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                         <input type="checkbox" name="type[]" value="Tailwind-CSS" class="accent-cyan-400">
                         <span class="text-white text-sm">Tailwind CSS</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                            <input type="checkbox" name="type[]" value="React" class="accent-cyan-400">
                            <span class="text-white text-sm">React</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                            <input type="checkbox" name="type[]" value="Laravel" class="accent-cyan-400">
                            <span class="text-white text-sm">Laravel</span>
                        </label>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2 italic">Compétences à valider (Multi-choix)</label>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach($competences as $competence)
                            <label class="flex items-center gap-3 cursor-pointer bg-white/5 p-3 rounded-xl border border-white/10 hover:border-cyan-400/40">
                                <input type="checkbox" name="competence_ids[]" value="{{ $competence->getId() }}" class="accent-cyan-400">
                                <span class="text-white text-sm">
                                    {{ $competence->getNom() }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2 italic">Description & Consignes</label>
                    <textarea rows="4" name="description" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all"></textarea>
                </div>

                <button class="w-full bg-white text-black font-black py-4 rounded-2xl uppercase tracking-[0.3em] text-xs hover:bg-cyan-400 transition-all duration-500 shadow-[0_10px_30px_rgba(255,255,255,0.05)]">
                    Diffuser le Brief aux Apprenants
                </button>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }
    </script>
</body>
</html>
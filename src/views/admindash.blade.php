<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Admin Dashboard | YouCode Sprint</title>
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
                    YouCode <br>
                    <span class="text-cyan-400 inline-block">Sprint</span>
                </h1>
                <div class="h-[2px] w-[40%] bg-cyan-500 mx-auto mt-2 rounded-full"></div>
            </header>

            <nav class="flex-1 space-y-4">
                <a href="#overview" class="flex items-center space-x-4 text-cyan-400 bg-white/5 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                    <i class="fas fa-th-large"></i>
                    <span>Overview</span>
                </a>
                <a href="#users" class="flex items-center space-x-4 text-white/60 hover:text-cyan-400 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all hover:bg-white/5">
                    <i class="fas fa-users"></i>
                    <span>Utilisateurs</span>
                </a>
                <a href="#sprints" class="flex items-center space-x-4 text-white/60 hover:text-cyan-400 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all hover:bg-white/5">
                    <i class="fas fa-layer-group"></i>
                    <span>Sprints</span>
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-white/5">
                <button class="w-full flex items-center space-x-4 text-red-400/60 hover:text-red-400 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                    <i class="fas fa-power-off"></i>
                    <span>Déconnexion</span>
                </button>
            </div>
        </aside>

        <main class="flex-1 p-4 md:p-8 overflow-y-auto">
            
            <div class="glass-card rounded-[1.5rem] p-4 mb-8 flex justify-between items-center px-8 animate-fade-in">
                <h2 class="text-cyan-400 font-black uppercase tracking-[0.3em] text-sm italic">Système d'administration</h2>
                <div class="flex items-center space-x-4">
                    @foreach($users as $user)
                        @if($user)
                            <div class="text-right">
                                <p class="text-[10px] text-white/40 uppercase font-bold tracking-widest leading-none">{{ $user->getFirstname() }} {{ $user->getLastname() }}</p>
                                <p class="text-xs font-black text-white uppercase">Admin Sprint</p>
                            </div>
                        @endif
                    @endforeach
                    <div class="w-10 h-10 rounded-full border-2 border-cyan-400/50 p-0.5">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=22d3ee&color=000" class="rounded-full" alt="avatar">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 animate-fade-in">
                <div class="glass-card p-8 rounded-[2rem] group hover:border-cyan-400/50 transition-all duration-500">
                    <p class="text-cyan-400/60 text-[10px] uppercase font-black tracking-[0.2em] mb-2">Total Apprenants</p>
                    <h3 class="text-4xl font-black tracking-tighter italic">1,240</h3>
                    <div class="mt-4 h-1 w-12 bg-cyan-500 rounded-full group-hover:w-full transition-all duration-700"></div>
                </div>
                <div class="glass-card p-8 rounded-[2rem] group hover:border-cyan-400/50 transition-all duration-500">
                    <p class="text-cyan-400/60 text-[10px] uppercase font-black tracking-[0.2em] mb-2">Sprints Actifs</p>
                    <h3 class="text-4xl font-black tracking-tighter italic">08</h3>
                    <div class="mt-4 h-1 w-12 bg-green-500 rounded-full group-hover:w-full transition-all duration-700"></div>
                </div>
                <div class="glass-card p-8 rounded-[2rem] group hover:border-cyan-400/50 transition-all duration-500">
                    <p class="text-cyan-400/60 text-[10px] uppercase font-black tracking-[0.2em] mb-2">Tâches en attente</p>
                    <h3 class="text-4xl font-black tracking-tighter italic">42</h3>
                    <div class="mt-4 h-1 w-12 bg-yellow-500 rounded-full group-hover:w-full transition-all duration-700"></div>
                </div>
            </div>

            <section id="users" class="mb-12 animate-fade-in" style="animation-delay: 0.2s;">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6 px-4">
                    <h2 class="text-cyan-400 font-black uppercase tracking-[0.3em] text-xl italic"><i class="fas fa-users mr-3"></i>Utilisateurs</h2>
                    <button onclick="toggleModal('userModal')" class="bg-cyan-400 text-black font-black px-6 py-3 rounded-xl hover:scale-105 transition-all uppercase tracking-widest text-[10px] flex items-center gap-2">
                        <i class="fas fa-plus"></i> Nouveau Membre
                    </button>
                </div>
                <div class="glass-card rounded-[2.5rem] overflow-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-cyan-400/60 text-[10px] uppercase tracking-[0.2em] border-b border-white/5">
                                <th class="p-8">Identité</th>
                                <th class="p-8">Rôle</th>
                                <th class="p-8">Contact</th>
                                <th class="p-8 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors">
                                <td class="p-8">
                                    @foreach($users as $user)
                                        @if($user)
                                            <p class="font-black text-white uppercase tracking-tight">{{ $user->getFirstname() }} {{ $user->getLastname() }}</p>
                                            <p class="text-[9px] text-white/30 uppercase tracking-widest">ID: #4401</p>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="p-8">
                                    <span class="px-3 py-1 bg-cyan-400/10 text-cyan-400 rounded-full text-[9px] font-black uppercase tracking-widest border border-cyan-400/20">Apprenant</span>
                                </td>
                                <td class="p-8 text-white/50 font-medium">a.lebrini@youcode.ma</td>
                                <td class="p-8 text-right space-x-2">
                                    <button class="w-8 h-8 rounded-lg bg-white/5 hover:bg-cyan-400/20 hover:text-cyan-400 transition-all text-white/40"><i class="fas fa-edit"></i></button>
                                    <button class="w-8 h-8 rounded-lg bg-white/5 hover:bg-red-500/20 hover:text-red-500 transition-all text-white/40"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="sprints" class="animate-fade-in" style="animation-delay: 0.3s;">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6 px-4">
                    <h2 class="text-cyan-400 font-black uppercase tracking-[0.3em] text-xl italic"><i class="fas fa-layer-group mr-3"></i>Sprints</h2>
                    <button onclick="toggleModal('SprintModal')" class="bg-cyan-400 text-black font-black px-6 py-3 rounded-xl hover:scale-105 transition-all uppercase tracking-widest text-[10px] flex items-center gap-2">
                        <i class="fas fa-plus"></i> Nouveau Sprint
                    </button>
                </div>
                <div class="glass-card rounded-[2.5rem] overflow-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-cyan-400/60 text-[10px] uppercase tracking-[0.2em] border-b border-white/5">
                                <th class="p-8">Titre du Sprint</th>
                                <th class="p-8">Période</th>
                                <th class="p-8 text-right">Actions</th>
                            </tr>
                        </thead>
                        @foreach($sprints as $sprint)
                        <tbody class="text-sm">
                            <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors">
                                <td class="p-8 font-black text-white uppercase tracking-tight italic">{{ $sprint->getTitre() }}</td>
                                <td class="p-8">
                                    <div class="flex items-center gap-3 text-white/50">
                                        <i class="far fa-calendar-alt text-cyan-400/50"></i>
                                        <span>19 Jan - 26 Jan 2026</span>
                                    </div>
                                </td>
                                <td class="p-8 text-right space-x-2">
                                    <button class="w-8 h-8 rounded-lg bg-white/5 hover:bg-cyan-400/20 hover:text-cyan-400 transition-all text-white/40"><i class="fas fa-edit"></i></button>
                                    <button class="w-8 h-8 rounded-lg bg-white/5 hover:bg-red-500/20 hover:text-red-500 transition-all text-white/40"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </section>

            <footer class="mt-12 mb-8 text-center">
                <p class="text-[10px] text-white/20 uppercase tracking-[0.5em]">YouCode Administration <span class="text-cyan-500/40 italic">Core v2.4.0</span></p>
            </footer>
        </main>
    </div>

    <div id="userModal" class="hidden fixed inset-0 bg-black/90 backdrop-blur-md z-50 flex items-center justify-center p-4">
        <div class="glass-card w-full max-w-lg p-10 rounded-[2.5rem] border-cyan-400/30">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-white text-2xl font-black italic uppercase tracking-tighter">Nouveau <span class="text-cyan-400">Membre</span></h3>
                <button onclick="toggleModal('userModal')" class="text-white/20 hover:text-white"><i class="fas fa-times"></i></button>
            </div>
            <form class="space-y-6">
                <div class="grid grid-cols-2 gap-4 text-left">
                    <div class="space-y-2">
                        <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2">Nom Complet</label>
                        <input type="text" placeholder="Ex: Jean" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2">Rôle</label>
                        <select class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all appearance-none">
                            <option value="apprenant" class="bg-zinc-900">Apprenant</option>
                            <option value="formateur" class="bg-zinc-900">Formateur</option>
                        </select>
                    </div>
                </div>
                <div class="space-y-2 text-left">
                    <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2">Email YouCode</label>
                    <input type="email" placeholder="nom@youcode.ma" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all">
                </div>
                <button type="submit" class="w-full bg-white text-black font-black py-4 rounded-2xl uppercase tracking-[0.2em] text-xs hover:bg-cyan-400 transition-all">Enregistrer</button>
            </form>
        </div>
    </div>

    <div id="SprintModal" class="hidden fixed inset-0 bg-black/90 backdrop-blur-md z-50 flex items-center justify-center p-4">
        <div class="glass-card w-full max-w-lg p-10 rounded-[2.5rem] border-cyan-400/30">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-white text-2xl font-black italic uppercase tracking-tighter">Créer <span class="text-cyan-400">Sprint</span></h3>
                <button onclick="toggleModal('SprintModal')" class="text-white/20 hover:text-white"><i class="fas fa-times"></i></button>
            </div>
            <form class="space-y-6 text-left" action="/addSprint" method="POST">
                <div class="space-y-2">
                    <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2">Titre du Sprint</label>
                    <input type="text" name="titre" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2">Début</label>
                        <input type="date" name="date_debut" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50">
                    </div>
                    <div class="space-y-2">
                        <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2">Fin</label>
                        <input type="date" name="date_fin" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50">
                    </div>
                </div>
                <button type="submit" class="w-full bg-cyan-400 text-black font-black py-4 rounded-2xl uppercase tracking-[0.2em] text-xs hover:bg-white transition-all">Lancer le Sprint</button>
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
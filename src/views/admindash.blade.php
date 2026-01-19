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
    </style>
</head>
<body class="bg-[url('https://42.fr/wp-content/uploads/2021/07/Background-RM-2000x1132.jpg')] bg-cover bg-center bg-no-repeat min-h-screen font-sans text-white">

    <div class="flex min-h-screen">
        
        <aside class="w-72 glass-card m-4 rounded-[2rem] hidden md:flex flex-col p-6 animate-fade-in">
            <header class="text-center mb-12">
                <h1 class="text-white text-2xl font-black italic uppercase tracking-tighter">
                    YouCode <br>
                    <span class="text-cyan-400 inline-block">Sprint</span>
                </h1>
                <div class="h-[2px] w-[40%] bg-cyan-500 mx-auto mt-2 rounded-full"></div>
            </header>

            <nav class="flex-1 space-y-4">
                <a href="#" class="flex items-center space-x-4 text-white/60 hover:text-cyan-400 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all hover:bg-white/5">
                    <i class="fas fa-users"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="#" class="flex items-center space-x-4 text-white/60 hover:text-cyan-400 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all hover:bg-white/5">
                    <i class="fas fa-users"></i>
                    <span>Utilisateurs</span>
                </a>
                <a href="#" class="flex items-center space-x-4 text-white/60 hover:text-cyan-400 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all hover:bg-white/5">
                    <i class="fas fa-layer-group"></i>
                    <span>Sprints</span>
                </a>
                <a href="#" class="flex items-center space-x-4 text-white/60 hover:text-cyan-400 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all hover:bg-white/5">
                    <i class="fas fa-layer-group"></i>
                    <span>Classes</span>
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-white/5">
                <form action="/logout" method="POST">
                    <button type="submit" name="logout" class="flex items-center space-x-4 text-red-400/60 hover:text-red-400 px-6 py-4 rounded-2xl font-black uppercase tracking-widest text-xs transition-all">
                        <i class="fas fa-power-off"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-4 md:p-8 overflow-y-auto animate-fade-in" style="animation-delay: 0.2s;">
            
            <div class="glass-card rounded-[1.5rem] p-4 mb-8 flex justify-between items-center px-8">
                <h2 class="text-cyan-400 font-black uppercase tracking-[0.3em] text-sm">Dashboard / Overview</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-[10px] text-white/40 uppercase font-bold tracking-widest">Admin Connecté</span>
                    <div class="w-10 h-10 rounded-full border-2 border-cyan-400/50 p-0.5">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=22d3ee&color=000" class="rounded-full" alt="avatar">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="glass-card p-8 rounded-[2rem] group hover:border-cyan-400/50 transition-all duration-500">
                    <p class="text-cyan-400/60 text-[10px] uppercase font-black tracking-[0.2em] mb-2">Total Apprenants</p>
                    <h3 class="text-4xl font-black tracking-tighter">1,240</h3>
                    <div class="mt-4 h-1 w-12 bg-cyan-500 rounded-full group-hover:w-full transition-all duration-700"></div>
                </div>
                <div class="glass-card p-8 rounded-[2rem] group hover:border-cyan-400/50 transition-all duration-500">
                    <p class="text-cyan-400/60 text-[10px] uppercase font-black tracking-[0.2em] mb-2">Sprints Validés</p>
                    <h3 class="text-4xl font-black tracking-tighter">85%</h3>
                    <div class="mt-4 h-1 w-12 bg-green-500 rounded-full group-hover:w-full transition-all duration-700"></div>
                </div>
                <div class="glass-card p-8 rounded-[2rem] group hover:border-cyan-400/50 transition-all duration-500">
                    <p class="text-cyan-400/60 text-[10px] uppercase font-black tracking-[0.2em] mb-2">Tâches en cours</p>
                    <h3 class="text-4xl font-black tracking-tighter">42</h3>
                    <div class="mt-4 h-1 w-12 bg-yellow-500 rounded-full group-hover:w-full transition-all duration-700"></div>
                </div>
            </div>

            <div class="glass-card rounded-[2rem] overflow-hidden">
                <div class="p-8 border-b border-white/5 flex justify-between items-center">
                    <h3 class="font-black uppercase tracking-widest text-sm">Activités Récentes</h3>
                    <button class="bg-white/5 hover:bg-cyan-400 hover:text-black text-[10px] font-black px-4 py-2 rounded-lg transition-all tracking-widest">VOIR TOUT</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-cyan-400/60 text-[10px] uppercase tracking-widest border-b border-white/5">
                                <th class="p-8">Utilisateur</th>
                                <th class="p-8">Projet</th>
                                <th class="p-8">Statut</th>
                                <th class="p-8">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors">
                                <td class="p-8 flex items-center space-x-4">
                                    <div class="w-8 h-8 bg-cyan-400/20 rounded-lg flex items-center justify-center text-cyan-400 font-bold">AL</div>
                                    <span class="font-bold">Amine Lebrini</span>
                                </td>
                                <td class="p-8 text-white/60 italic font-medium tracking-tight">Docker Infrastructure</td>
                                <td class="p-8">
                                    <span class="px-3 py-1 bg-cyan-400/10 text-cyan-400 rounded-full text-[10px] font-black uppercase tracking-tighter border border-cyan-400/20">En cours</span>
                                </td>
                                <td class="p-8">
                                    <button class="text-white/20 hover:text-white transition-colors"><i class="fas fa-ellipsis-h"></i></button>
                                </td>
                            </tr>
                            <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors">
                                <td class="p-8 flex items-center space-x-4">
                                    <div class="w-8 h-8 bg-purple-400/20 rounded-lg flex items-center justify-center text-purple-400 font-bold">SA</div>
                                    <span class="font-bold">Sara Alami</span>
                                </td>
                                <td class="p-8 text-white/60 italic font-medium tracking-tight">API Authentication</td>
                                <td class="p-8">
                                    <span class="px-3 py-1 bg-green-400/10 text-green-400 rounded-full text-[10px] font-black uppercase tracking-tighter border border-green-400/20">Validé</span>
                                </td>
                                <td class="p-8">
                                    <button class="text-white/20 hover:text-white transition-colors"><i class="fas fa-ellipsis-h"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="animate-fade-in p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                    <div>
                     <h2 class="text-cyan-400 font-black uppercase tracking-[0.3em] text-xl">Gestion des Utilisateurs</h2>
                        <p class="text-white/40 text-[10px] uppercase tracking-widest mt-1">Gérer les accès des Formateurs et Apprenants</p>
                    </div>
        
                    <button onclick="toggleModal()" class="group relative overflow-hidden bg-cyan-400 text-black font-black px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-[1.05] active:scale-[0.95] uppercase tracking-widest text-xs flex items-center gap-3">
                        <i class="fas fa-user-plus"></i>
                        <span>Ajouter Utilisateur</span>
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </button>
                </div>
                <div class="glass-card rounded-[2.5rem] overflow-hidden">
                 <table class="w-full text-left">
                     <thead>
                         <tr class="text-cyan-400/60 text-[10px] uppercase tracking-[0.2em] border-b border-white/5">
                             <th class="p-8">Utilisateur</th>
                             <th class="p-8">Rôle</th>
                             <th class="p-8">Email</th>
                             <th class="p-8 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($users as $user)
                            <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors group">
                                <td class="p-8 flex items-center space-x-4">
                                 <div>
                                     <p class="font-black text-white uppercase tracking-tight"><?= $user->getFirstname() . " " . $user->getLastname(); ?></p>
                                      <p class="text-[10px] text-white/30">ID: <?= $user->getId(); ?></p>
                                             </div>
                                         </td>
                                         <td class="p-8">
                                          <span class="px-3 py-1 bg-purple-500/10 text-purple-400 rounded-full text-[9px] font-black uppercase tracking-widest border border-purple-500/20">
                                                 <?= $user->getRole(); ?>
                                            </span>
                                        </td>
                                        <td class="p-8 text-white/50 font-medium"><?= $user->getEmail(); ?></td>
                                        <td class="p-8 text-right space-x-2">
                                            <button class="w-8 h-8 rounded-lg bg-white/5 hover:bg-cyan-400/20 hover:text-cyan-400 transition-all text-white/40"><i class="fas fa-edit"></i></button>
                                             <button class="w-8 h-8 rounded-lg bg-white/5 hover:bg-red-500/20 hover:text-red-500 transition-all text-white/40"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


            <div id="userModal" class="hidden fixed inset-0 bg-black/90 backdrop-blur-md z-50 flex items-center justify-center p-4">
                <div class="glass-card w-full max-w-lg p-10 rounded-[2.5rem] border-cyan-400/30 animate-fade-in">
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="text-white text-2xl font-black italic uppercase tracking-tighter">Nouveau <span class="text-cyan-400">Membre</span></h3>
                        <button onclick="toggleModal()" class="text-white/20 hover:text-white"><i class="fas fa-times"></i></button>
                    </div>
        
                    <form class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2">Nom Complet</label>
                                <input type="text" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all">
                            </div>
                            <div class="space-y-2">
                                <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2">Rôle</label>
                                <select class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all appearance-none">
                        <option value="apprenant" class="bg-zinc-900">Apprenant</option>
                                    <option value="formateur" class="bg-zinc-900">Formateur</option>
                                </select>
                            </div>
                        </div>
            
                        <div class="space-y-2">
                            <label class="text-cyan-400/60 text-[9px] font-black uppercase tracking-widest ml-2">Email Académique</label>
                            <input type="email" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-5 text-white outline-none focus:border-cyan-400/50 transition-all">
                        </div>

                        <button class="w-full bg-white text-black font-black py-4 rounded-2xl uppercase tracking-[0.2em] text-xs hover:bg-cyan-400 transition-colors duration-500">
                            Enregistrer l'utilisateur
                        </button>
                    </form>
                </div>
            </div>


            <!--2-->

            <div class="animate-fade-in p-4 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                    <h2 class="text-cyan-400 font-black uppercase tracking-[0.3em] text-xl">Gestion des Sprints</h2>
                <button onclick="toggleModal()" class="group relative overflow-hidden bg-cyan-400 text-black font-black px-8 py-4 rounded-2xl transition-all duration-300 transform hover:scale-[1.05] active:scale-[0.95] uppercase tracking-widest text-xs flex items-center gap-3">
                        <i class="fas fa-plus"></i>
                        <span>Ajouter Sprint</span>
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </button>
                </div>

                <div class="glass-card rounded-[2.5rem] overflow-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-cyan-400/60 text-[10px] uppercase tracking-[0.2em] border-b border-white/5">
                                <th class="p-8">Titre</th>
                                <th class="p-8">Date de début</th>
                                <th class="p-8">Date de fin</th>
                                <th class="p-8 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($sprints as $sprint)
                            <tr class="border-b border-white/5 hover:bg-white/[0.02] transition-colors group">
                                <td class="p-8 font-black text-white uppercase tracking-tight">{{ $sprint->getTitre() }}</td>
                                <td class="p-8 text-white/50 font-medium">{{ $sprint->getDateDebut() }}</td>
                                <td class="p-8 text-white/50 font-medium">{{ $sprint->getDateFin() }}</td>
                                <td class="p-8 text-right space-x-2">
                                    <button class="w-8 h-8 rounded-lg bg-white/5 hover:bg-cyan-400/20 hover:text-cyan-400 transition-all text-white/40"><i class="fas fa-edit"></i></button>
                                    <button class="w-8 h-8 rounded-lg bg-white/5 hover:bg-red-500/20 hover:text-red-500 transition-all text-white/40"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <footer class="mt-12 text-center">
                <p class="text-[12px] text-white/20 uppercase tracking-[0.4em]">Administration YouCode <span class="text-cyan-500/30">System v2.4.0</span></p>
            </footer>
        </main>
    </div>
    <script>
    function toggleModal() {
        const modal = document.getElementById('userModal');
        modal.classList.toggle('hidden');
    }
</script>
</body>
</html>
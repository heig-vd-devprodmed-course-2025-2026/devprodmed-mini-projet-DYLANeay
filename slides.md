---
marp: true
paginate: true
theme: default
size: 16:9
style: |
    @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap');
    /* ------------------------------------------------------------------
     * Theme: Terminal Dossier — dark, warm-amber accent, monospace meta
     * ------------------------------------------------------------------ */
    section {
      font-family: 'Space Grotesk', 'Inter', system-ui, sans-serif;
      background: #0D1117;
      color: #E6EDF3;
      padding: 60px 80px 70px;
      font-size: 26px;
      line-height: 1.55;
      overflow: hidden;
      position: relative;
    }
    section::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 6px; height: 100%;
      background: linear-gradient(180deg, #FFA657 0%, #FFA657 35%, transparent 35%);
    }
    section::after {
      color: #6E7681;
      font-size: 0.7em;
      font-weight: 500;
      font-family: 'JetBrains Mono', monospace;
    }
    section.cover {
      background:
        radial-gradient(ellipse at 80% 20%, rgba(255, 166, 87, 0.10), transparent 55%),
        radial-gradient(ellipse at 20% 90%, rgba(121, 192, 255, 0.05), transparent 60%),
        #0D1117;
      justify-content: center;
    }
    section.cover::before { display: none; }
    section.cover h1 {
      font-size: 2.7em;
      font-weight: 700;
      border: none;
      color: #F0F6FC;
      margin: 0 0 0.25em;
      padding: 0;
      display: block;
      letter-spacing: -0.025em;
      line-height: 1.1;
    }
    section.cover h1::before { content: none; }
    section.cover h2 {
      color: #FFA657;
      font-weight: 500;
      font-size: 1.05em;
      margin: 0;
      font-family: 'JetBrains Mono', monospace;
      letter-spacing: -0.01em;
    }
    section.cover h2::before {
      content: '// ';
      color: #6E7681;
    }
    section.cover .meta {
      margin-top: 90px;
      color: #8B949E;
      font-size: 0.85em;
      font-weight: 500;
      font-family: 'JetBrains Mono', monospace;
      letter-spacing: 0.3px;
      border-left: 2px solid #FFA657;
      padding-left: 14px;
    }
    h1 {
      color: #F0F6FC;
      font-weight: 700;
      font-size: 1.45em;
      margin: 0 0 0.7em;
      padding-bottom: 0.35em;
      border-bottom: 1px solid #30363D;
      letter-spacing: -0.015em;
      display: block;
    }
    h1::before {
      content: '# ';
      color: #FFA657;
      font-family: 'JetBrains Mono', monospace;
      font-weight: 600;
    }
    h2 {
      color: #C9D1D9;
      font-weight: 600;
      font-size: 1em;
      margin-top: 0.5em;
    }
    strong {
      color: #FFA657;
      font-weight: 600;
    }
    p, li { color: #F0F6FC; }
    ul, ol { line-height: 1.75; }
    ul li::marker {
      color: #FFA657;
      font-weight: 700;
    }
    ol li::marker {
      color: #FFA657;
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      font-size: 0.74em;
      margin: 0.6em 0;
      line-height: 1.45;
    }
    thead, tbody, tfoot, tr, th, td {
      background: #161B22;
      color: #F0F6FC;
    }
    th, td {
      padding: 12px 16px;
      border: 1px solid #30363D;
      text-align: left;
      vertical-align: top;
    }
    th {
      background: #1F242C;
      color: #FFA657;
      font-weight: 700;
      font-size: 0.95em;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      font-family: 'JetBrains Mono', monospace;
      border-bottom: 2px solid #FFA657;
    }
    tbody tr:nth-child(even) td {
      background: #1A1F27;
    }
    tbody td:first-child {
      font-family: 'JetBrains Mono', monospace;
      color: #FFA657;
      font-weight: 600;
    }
    tbody td:first-child code {
      background: rgba(255, 166, 87, 0.22);
      border-color: rgba(255, 166, 87, 0.55);
      color: #FFD6A8;
    }
    .cols {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 36px;
      align-items: start;
    }
    .pill {
      display: inline-block;
      padding: 5px 14px;
      background: transparent;
      color: #FFA657;
      border: 1px solid #FFA657;
      border-radius: 0;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.7em;
      font-weight: 600;
      letter-spacing: 0.12em;
      margin-bottom: 26px;
      text-transform: uppercase;
    }
    .pill::before { content: '[ '; opacity: 0.55; }
    .pill::after  { content: ' ]'; opacity: 0.55; }
    /* ------------------------------------------------------------------
     * Inline code
     * ------------------------------------------------------------------ */
    code {
      font-family: 'JetBrains Mono', 'Fira Code', Menlo, monospace;
      background: rgba(255, 166, 87, 0.10);
      color: #FFA657;
      padding: 2px 7px;
      border-radius: 3px;
      font-size: 0.88em;
      font-weight: 500;
      border: 1px solid rgba(255, 166, 87, 0.22);
    }
    /* ------------------------------------------------------------------
     * Blocs de code — thème Dracula (préservé)
     * ------------------------------------------------------------------ */
    pre {
      background: #282A36 !important;
      border-radius: 6px;
      border: 1px solid #30363D;
      padding: 18px 22px;
      font-size: 0.55em;
      line-height: 1.6;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
      margin: 0.4em 0;
    }
    pre code,
    pre code * {
      background: transparent !important;
      color: #F8F8F2 !important;
      padding: 0;
    }
    pre code .hljs-keyword,
    pre code .hljs-selector-tag,
    pre code .hljs-tag,
    pre code .hljs-name {
      color: #FF79C6 !important;
    }
    pre code .hljs-string,
    pre code .hljs-attr,
    pre code .hljs-symbol,
    pre code .hljs-bullet,
    pre code .hljs-addition {
      color: #F1FA8C !important;
    }
    pre code .hljs-built_in,
    pre code .hljs-type,
    pre code .hljs-title.class_,
    pre code .hljs-class .hljs-title {
      color: #8BE9FD !important;
    }
    pre code .hljs-number,
    pre code .hljs-literal,
    pre code .hljs-doctag {
      color: #BD93F9 !important;
    }
    pre code .hljs-comment,
    pre code .hljs-quote,
    pre code .hljs-meta {
      color: #6272A4 !important;
      font-style: italic;
    }
    pre code .hljs-function,
    pre code .hljs-title.function_,
    pre code .hljs-title {
      color: #50FA7B !important;
    }
    pre code .hljs-variable,
    pre code .hljs-template-variable,
    pre code .hljs-attribute {
      color: #F8F8F2 !important;
    }
    pre code .hljs-params {
      color: #FFB86C !important;
    }
    pre code .hljs-operator,
    pre code .hljs-punctuation {
      color: #F8F8F2 !important;
    }
---

<!-- _class: cover -->
<!-- _paginate: false -->

<span class="pill">Laravel 12</span>

# Système de signalement des posts

## Modération communautaire d'un réseau social

<div class="meta">
Dylan Eray, M53-2
</div>

---

# La nouvelle fonctionnalité

**Problème identifié**

Aucun mécanisme de modération : un post problématique reste en ligne sans recours.

**Solution : système de signalement**

1. Un utilisateur connecté **signale** un post.
2. Un **administrateur** consulte un dashboard dédié.
3. L'admin choisit : **ignorer** le signalement ou **supprimer** le post.

---

# Architecture en trois piliers

| Pilier                 | Enjeu               | Implémentation                                         |
| ---------------------- | ------------------- | ------------------------------------------------------ |
| **1. Modèle `Report`** | Données & intégrité | Table dédiée, relations Eloquent, contraintes BDD      |
| **2. Rôle `admin`**    | Autorisation        | Middleware custom, dashboard de modération             |
| **3. API versionnée**  | Interopérabilité    | `POST /api/v1/posts/{post}/report` protégé par Sanctum |

---

# Données

- **Clés étrangères** `post_id` et `user_id` avec `cascadeOnDelete`
- **Unicité composite** `(post_id, user_id)` : un seul signalement par utilisateur et par post
- **Énumération** `status` (`pending` / `dismissed`)
- Champ `reason` optionnel

```php
// database/migrations/2026_04_24_114951_create_reports_table.php
Schema::create('reports', function (Blueprint $t) {
    $t->id();
    $t->foreignId('post_id')->constrained()->cascadeOnDelete();
    $t->foreignId('user_id')->constrained()->cascadeOnDelete();
    $t->string('reason')->nullable();
    $t->enum('status', ['pending', 'dismissed'])->default('pending');
    $t->timestamps();
    $t->unique(['post_id', 'user_id']);
});
```

---

# Authentification & modération

<div class="cols">
<div>

**Rôle administrateur**

- Migration `is_admin` (booléen, défaut `false` pour les anciens users)
- Middleware custom `admin`

```php
// app/Http/Middleware/AdminMiddleware.php
public function handle($request, Closure $next)
{
    abort_unless($request->user()?->is_admin, 403);
    return $next($request);
}
```

</div>
<div>

**Dashboard**

```php
// Admin\ReportController@index
$pending = fn($q) => $q->where('status', 'pending');

Post::whereHas('reports', $pending)
    ->withCount(['reports as count' => $pending])
    ->latest()->paginate(15);
```

**Action « Ignorer »**

```php
// Admin\ReportController@dismiss
$post->reports()
    ->where('status', 'pending')
    ->update(['status' => 'dismissed']);
```

</div>
</div>

---

# API REST sécurisée

**Route versionnée**

```php
// routes/api.php
Route::post("/v1/posts/{post}/report", [
    ApiReportController::class,
    "store",
])->middleware(["auth:sanctum", "abilities:report:create"]);
```

**Logique métier**

```php
// app/Http/Controllers/ApiReportController.php
$alreadyReported = Report::where('post_id', $post->id)
    ->where('user_id', Auth::id())->exists();

if ($alreadyReported) {
    return response()->json(['message' => __('ui.reports.already_reported')], 409); // 409 => Conflit / violation contrainte
}

$post->reports()->create([...]);
return response()->json(['message' => __('ui.reports.reported')], 201); // 201 => Ressource créée
```

---

# Développement, Issues & Pull Requests

**Découpage en 6 issues GitHub, chacunes liées à un PR qui se merge sur `main`. Architecture proposée par moment par Claude Opus 4.6/4.7 via Claude Code**

| Issue   | Titre                                                | PR correspondante                                               |
| ------- | ---------------------------------------------------- | --------------------------------------------------------------- |
| **#50** | Ajouter un rôle admin sur les utilisateurs           | **#51** — 50 ajouter un rôle admin sur les utilisateurs         |
| **#52** | Créer le modèle et la migration Report               | **#53** — 52 créer le modèle et la migration report             |
| **#54** | Permettre aux utilisateurs de signaler un post       | **#55** — 54 permettre aux utilisateurs de signaler un post     |
| **#56** | Créer le dashboard admin des posts signalés          | **#57** — 56 créer le dashboard admin des posts signalés        |
| **#58** | Actions admin : ignorer ou supprimer un post signalé | **#59** — 58 actions admin ignorer ou supprimer un post signalé |
| **#60** | Exposer le signalement via l'API                     | **#61** — 60 exposer le signalement via lapi                    |

---

<!-- _class: cover -->
<!-- _paginate: false -->

<span class="pill">Merci !</span>

# Questions ?

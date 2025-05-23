use crate::pages::{article_edits_resource, article_resource};
use ibis_frontend_components::{
    Pending,
    article_nav::{ActiveTab, ArticleNav},
    suspense_error::SuspenseError,
    utils::formatting::{edit_time, user_link},
};
use leptos::{either::Either, prelude::*};
use leptos_meta::Title;
use leptos_router::hooks::use_params_map;

#[component]
pub fn EditDiff() -> impl IntoView {
    let params = use_params_map();
    let article = article_resource();

    view! {
        <ArticleNav article=article active_tab=ActiveTab::History />
        <SuspenseError result=article>
            {move || Suspend::new(async move {
                let edits = article_edits_resource(article).await;
                let article_title = article.await.map(|a| a.article.title()).unwrap_or_default();
                edits
                    .await
                    .map(|edits| {
                        let hash = params.get_untracked().get("hash").clone();
                        let edit = edits.iter().find(|e| Some(e.edit.hash.0.to_string()) == hash);
                        if let Some(edit) = edit {
                            let pending = edit.edit.pending;
                            let title = format!(
                                "Diff {} — {}",
                                &edit.edit.summary,
                                article_title,
                            );
                            Either::Left(
                                view! {
                                    <Title text=title />
                                    <div class="flex w-full">
                                        <h2 class="my-2 font-serif text-xl font-bold grow">
                                            {edit.edit.summary.clone()} " ("
                                            {edit_time(edit.edit.published)} ")"
                                        </h2>
                                        <Pending pending />
                                    </div>
                                    <p>"by " {user_link(&edit.creator)}</p>
                                    <div class="max-w-full prose prose-slate">
                                        <pre class="text-wrap">
                                            <code>{edit.edit.diff.clone()}</code>
                                        </pre>
                                    </div>
                                },
                            )
                        } else {
                            Either::Right(
                                view! {
                                    <div class="grid place-items-center h-screen">
                                        <div class="alert alert-error w-fit">Invalid edit</div>
                                    </div>
                                },
                            )
                        }
                    })
            })}

        </SuspenseError>
    }
}

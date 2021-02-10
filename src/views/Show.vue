<template>
    <div class="pt-5 px-5">
        <div class="repository-info container-lg clearfix bg-secondary border mx-auto py-4">
            <div class="col-12">
                <div class="mb-4">
                    <h2>
                        <a :href="repoURL" target="_blank" class="orange" rel="noopener noreferrer">
                            {{ repoOwner }}/{{ repoName }}
                        </a>
                    </h2>
                </div>
            </div>
            <div class="col-lg-4 col-6 sm-offset-3 mb-3 float-left">
                <img :src="issuesImg" alt="Issues" class="w-inherit"/>
                <div class="contribution tooltipped tooltipped-s" aria-label="Issues">
                    <span class="border-dotted">
                        {{ issues.length }}
                    </span>
                </div>
            </div>
            <div class="col-lg-4 col-6 sm-offset-3 float-left">
                <img :src="pullRequestsImg" alt="PullRequests" class="w-inherit"/>
                <div class="contribution tooltipped tooltipped-s" aria-label="Pull Requests">
                    <span class="border-dotted">
                        {{ pullRequests.length }}
                    </span>
                </div>
            </div>
            <div class="col-lg-4 col-6 sm-offset-3 float-left">
                <img :src="commitsImg" alt="Commits" class="w-inherit pt-2"/>
                <div class="contribution tooltipped tooltipped-s" aria-label="Commits">
                    <span class="border-dotted">
                        {{ commits.length }}
                    </span>
                </div>
            </div>
            <div class="col-12 float-left">
                <div class="my-4">
                    <strong>
                        Colaboradores
                    </strong>
                    <div class="mt-4">
                        <div class="col-12">
                            <a 
                                v-for="contributor in contributors" :key="contributor.id"
                                :href="contributor.html_url" target="_blank" rel="noopener noreferrer"
                            >
                                <img :src="contributor.avatar_url" alt="Avatar" class="avatar mx-2 mb-2" width="90"/>
                            </a>
                            <!--
                                TODO: find out why a computed property isn't working
                            -->
                            <template v-if="!Object.keys(this.contributors).length">
                                <div>
                                    Não há nenhuma contribuição nesse período ;( 
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 float-left post-scriptum">
                <small>
                    Contribuições relativas ao período de 01/10/{{currentYear}}
                    à 31/10/{{currentYear}}.
                </small>
            </div>
        </div>
    <TheFooter/>
    </div>

</template>

<script>

import axios from 'axios';
const ISSUE = 0;
const PULL_REQUEST = 1;

export default {
    name: 'ShowRepository',
    data(){
        return {
            repoName: String,
            repoOwner: String,
            repoURL: String,
            issuesImg: require('@/assets/images/issues.png'),
            pullRequestsImg: require('@/assets/images/pull-request.png'),
            commitsImg: require('@/assets/images/commit.png'),
            issues: [],
            pullRequests: [],
            commits: [],
            contributors: {}
        }
    },

    props: {
        currentYear: {
            type: Number,
            default: 2020
        }
    },

    methods: {
        fetchContributions(){
            let baseUrl = `https://api.github.com/repos/${this.repoOwner}/${this.repoName}`;
            
            axios.get(`${baseUrl}/issues?since=${this.currentYear}-10-01`)
            .catch((err) => {
                console.error(err);
            })
            .then((response) => {
                if(response.data) {
                    this.issues = response.data.filter(i => {
                        return new Date(i.created_at) >= new Date(`${this.currentYear}-10-1`) &
                               new Date(i.created_at) <= new Date(`${this.currentYear}-10-31`);
                    });
                    this.getContributorsBy(ISSUE);
                }
            });

            axios.get(`${baseUrl}/pulls?state=all`)
            .catch(err => {
                console.error(err);
            })
            .then(response => {
                if(response && response.data) {
                    this.pullRequests = response.data.filter(i => {
                        return new Date(i.created_at) >= new Date(`${this.currentYear}-10-1`) &&
                               new Date(i.created_at) <= new Date(`${this.currentYear}-10-31`);
                    });
                    this.getContributorsBy(PULL_REQUEST);
                }
            });

            axios.get(`${baseUrl}/commits?since=${this.currentYear}-10-01`)
            .catch(err => {
                console.error(err);
            })
            .then(response => {
                if(response && response.data) {
                    this.commits = response.data.filter(i => {
                        return new Date(i.commit.author.date) >= new Date(`${this.currentYear}-10-1`) &&
                               new Date(i.commit.author.date) <= new Date(`${this.currentYear}-10-31`);
                    });
                }
            });
        },

        getContributorsBy(contributionType){
            let contributions = contributionType == ISSUE ? this.issues : this.pullRequests;
            contributions.forEach(c => {
                this.contributors[c.user.id] = c.user;
            });
        }
    },

    mounted(){
        this.repoName = this.$route.params.name;
        this.repoOwner = this.$route.params.owner;
        this.repoURL = this.$route.params.url;
        this.fetchContributions();
    }
}
</script>

<style>

    .repository-info {
        min-height: 90vh;
        font-size: 2rem;
    }

    .w-inherit {
        width: inherit !important;
    }

    @media (max-width: 360px) {
        .sm-offset-3 {
            margin-left: 25% !important;
        }
    }

    .post-scriptum {
        font-size: 0.8rem;
    }

    .avatar {
        border-radius: 3.5rem;
        border: 3px solid #ffffff;
    }

    .border-dotted {
        border-bottom: 1px dotted;
    }
</style>
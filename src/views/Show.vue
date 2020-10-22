<template>
    <div class="pt-5 px-5">
        <div class="repository-info container-lg clearfix bg-secondary border mx-auto py-4">
            <div class="col-12 name">
                <div class="mb-4">
                    <strong>
                        {{ repoOwner }}/{{ repoName }}
                    </strong>
                </div>
            </div>
            <div class="col-lg-4 col-6 sm-offset-3 mb-3 float-left">
                <img :src="issuesImg" alt="Issues" class="w-inherit"/>
                <div class="contribution tooltipped tooltipped-s" aria-label="Issues">
                    {{ issues.length }}
                </div>
            </div>
            <div class="col-lg-4 col-6 sm-offset-3 float-left">
                <img :src="pullRequestsImg" alt="PullRequests" class="w-inherit"/>
                <div class="contribution tooltipped tooltipped-s" aria-label="Pull Requests">
                    11
                </div>
            </div>
            <div class="col-lg-4 col-6 sm-offset-3 float-left">
                <img :src="commitsImg" alt="Commits" class="w-inherit pt-2"/>
                <div class="contribution tooltipped tooltipped-s" aria-label="Commits">
                    200
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
                                class="tooltipped tooltipped-n" :aria-label="contributor.login"
                            >
                                <img :src="contributor.avatar_url" alt="Avatar" class="avatar mx-2" width="90"/>
                            </a>
                            <!--
                                TODO: find out why a computed property isn't working
                            -->
                            <template v-if="!Object.keys(contributors).length">
                                <div>
                                    Não há nenhuma contribuição nesse período ;( 
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="Object.keys(contributors).length" class="col-12 float-left post-scriptum">
                <small>
                    Contribuições relativas ao período de 01/10/2020
                    à 31/10/2020
                </small>
            </div>
        </div>
    <TheFooter/>
    </div>

</template>

<script>

import axios from 'axios';

export default {
    name: 'ShowRepository',
    data(){
        return {
            repoName: String,
            repoOwner: String,
            issuesImg: require('@/assets/images/issues.png'),
            pullRequestsImg: require('@/assets/images/pull-request.png'),
            commitsImg: require('@/assets/images/commit.png'),
            issues: {},
            contributors: {}
        }
    },

    props: {
        currentYear: {
            type: Number,
            default: new Date().getFullYear()
        }
    },

    methods: {
        fetchContributions(){
            let baseUrl = `https://api.github.com/repos/${this.repoOwner}/${this.repoName}`;
            
            axios.get(`${baseUrl}/issues?since=${this.currentYear}-10-01`)
            .catch((err) => {
                console.log(err);
            })
            .then((response) => {
                if(response.data) {
                    this.issues = response.data.filter(i => {
                        return Date(i.created_at) >= Date(`${this.currentYear}-10-01`) &&
                               Date(i.created_at) <= Date(`${this.currentYear}-10-31`);
                    });
                    this.getContributors();
                }
            });
        },

        getContributors(){
            this.issues.forEach(issue => {
                this.contributors[issue.user.id] = issue.user;
            });
        }
    },

    mounted(){
        this.repoName = this.$route.params.name;
        this.repoOwner = this.$route.params.owner;
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
</style>